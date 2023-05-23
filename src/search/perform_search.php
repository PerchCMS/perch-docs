<?php
    include_once('functions.php');
    include_once('../../php/vendor/autoload.php');
    include_once('../../php/search_config.php');

    use Elasticsearch\ClientBuilder;

    $Paging = false;
    $facet = false;

    
    if ($query) {
        $rawquery = $query;
        $query = urldecode($query);
        $query = str_replace('|', '/', $query);
        
        
        // type 
        if ($search_type) {
            $type = $search_type;
        }else{
            $type = false;
        }
                
        // Page title
        if ($type) {
            $result_title = 'Search for: '.$query.' within '.$type;
            $page_heading = 'Search results for “'.$query.'” in '.$type;
        }else{
            $result_title = 'Search for: '.$query;
            $page_heading = 'Search results for “'.$query.'”';
        }
        
    
        $Paging = new Paging;

        // create a client instance
        $Client = ClientBuilder::create()
                ->setHosts($Config->elastic_hosts)
                ->allowBadJSONSerialization()
                ->build();



        // execute the ping query
        try{
            $server_up = $Client->ping();

            if ($server_up) {

                $params = [
                    'index' => $Config->index,
                    'type'  => $Config->type,
                    'from'  => $Paging->lower_bound(),
                    'size'  => $Paging->per_page(),
                    'body' => [
                        'query' => [
                            'match' => [
                                'text' => $query
                            ]
                        ],
                        'aggs' => [
                            'ftype' => [
                                'terms' => [
                                    'field' => 'doctype',
                                ]
                            ],
                        ],
                        'suggest' => [
                            'spelling' => [
                                'text' => $query,
                                'term' => [
                                    'field' => 'text',
                                ],
                            ],
                        ],
                    ]
                ];

                // filter on type
                if ($search_type) {
                    $params['body']['post_filter'] = [
                        'term' => [
                            'doctype' => $search_type,
                        ]
                    ];
                }

            


                $resultset = $Client->search($params);


                $Paging->set_total((int)$resultset['hits']['total']);

                $out = [];

                // URL opts
                $url_opts                = array();
                $url_opts['type']        = $search_type;
                $url_opts['order']       = $result_order;
                $url_opts['keywords']    = $query;

                $facet = $resultset['aggregations']['ftype'];

                if (count($facet['buckets'])) {
                    $first = true;
                    
                    foreach($facet['buckets'] as $bucket) {
                        $count = (int)$bucket['doc_count'];
                        $value = $bucket['key'];

                        if ($count) {
                            $tmp = array();
                            
                            if ($first) {
                                $tmp['order.recent'] = build_url($url_opts, 'order', 'recent');
                                $tmp['order.relevant'] = build_url($url_opts, 'order', 'relevant');
                                
                                $first=false;
                            }
                            
                            
                            $tmp['value'] = $value;
                            $tmp['count'] = $count;
                            $tmp['selected'] = ($value==$type);
                            $tmp['link'] = build_url($url_opts, 'type', $value);
                            if ($type) $tmp['clear_url'] = build_url($url_opts, 'type', false);
                            $out[] = $tmp;
                        }
                    }
                }



                $results = [
                    'facets'        => $out,
                    'search.result' => $resultset,
                    'search.paging' => $Paging,
                    'search.done'   => true,
                    'result.title'  => $result_title,
                    'page.heading'  => $page_heading
                ];

            }
                        
            
        }catch(\Exception $e){

        }

        
    }else{
        $results = false;
    }
    