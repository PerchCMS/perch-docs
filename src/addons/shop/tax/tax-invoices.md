---
title: Tax Invoices
nav_groups:
  - primary
---

Different tax regimes have different rules for invoicing. In particular the rules on VAT invoicing within the EU are complex. We cannot advise as to whether any particular invoice is a correct VAT invoice (you should check this with your accountant) but we believe we have the tools available to create correct invoices.

If you are building a site for a client it is worth finding out if they need the system to display full tax invoices. Sometimes they may prefer to just display a payment receipt and allow people to request a full VAT invoice if they need it (especially if you are mostly selling to consumers). This would allow you to send and/or display simpler invoices.

The following are some ways in which Perch Shop can help you create tax invoices.

## Displaying tax in your home currency

If you take payment in a currency that is not the currency you report your tax in, then you may be obligated to display the tax amount in your home currency on invoices.

This is the case within the European Union (EU) for VAT. If you are based in the UK but price your products in USD you will still need to display the amount of VAT charged in GBP.

Under Settings in Perch you can set your Reporting Currency. This is the currency you use for tax reporting and can be different from your default currency - for example a UK store selling software to a global audience may decide to price in USD.

When you set up a Currency under Shop > Currencies you can then set an exchange rate there for this currency to use. This can be displayed in the invoice to meet any obligation to do so.

```html
    <div class="conversion-rates">
      <div class="rate"><strong>GBP Equivalent Conversion</strong>
      <br>1 GBP = <perch:shop id="exchange_rate"> USD</div>
      <table>
        <tr>
          <th>VAT Rate</th>
          <th>Net Amount</th>
          <th>VAT</th>
        </tr>
        <perch:taxrates>
        <tr>
          <td><perch:taxrate id="tax_rate_formatted"></td>
          <td><perch:taxrate id="reporting_value_formatted"></td>
          <td><perch:taxrate id="reporting_tax_formatted"></td>
        </tr>
        </perch:taxrates>
      </table>
    </div>
```html

### Choosing a currency rate

Your tax authority will give you guidance on allowable sources of currency rates. For example HMRC publishes the [UK rates here](https://www.gov.uk/government/publications/hmrc-exchange-rates-for-2016-monthly). You or your customer would need to ensure your exchange rates are updated.

It is possible to use a "live" rate from elsewhere. We are currently able to get the rate used when Stripe converts a payment in an alternate currency to your bank account currency, so you could use this in your invoicing however if you do so you or your client must get official approval from the tax authority to do so. **Check with your accountant**.

## Displaying the amount of tax taken at each tax rate

Typically purchase tax includes tax at different rates. A Standard Rate, a Reduced Rate and then items that are Zero rated. A mixed order could include items from more than one tax rate and on your invoice you would need to show the amount of tax charged at each rate. Perch Shop can cope with this requirement, and the `<perch:taxrates></perch:taxrates>` tags will enable you to loop through the tax rates applicable to your order and display each item. For example, assuming I had collected 5.80 at 20% and 2.20 at 5.5%. The following code would output two table rows, one row for each tax percentage.

```html
    <perch:taxrates>
      <tr>
        <th>Total VAT <perch:taxrate id="tax_rate_formatted"></th>
        <td><perch:taxrate id="total_tax"></td>
      </tr>
    </perch:taxrates>
```

For more details on the tags you can use to display an invoice or purchase receipt see Orders > Template Tags.

## Sequential Invoice Numbers

In order to comply with sequential invoice numbers we create an invoice number only on a successful order (rather than you needing to use the database ID that may include failed or abandoned orders). You can choose a prefix or suffix for the invoice number by editing the value in Perch Settings, Invoice Number Format. The `%d` is the sequential number. You can add in there any other string you like.
