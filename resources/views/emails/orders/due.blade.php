
<x-mail::message>
    <style>
        #products {
          font-family: Arial, Helvetica, sans-serif;
          border-collapse: collapse;
          width: 100%;
        }
        
        #products td, #products th {
          border: 1px solid #ddd;
          padding: 8px;
        }
        
        #products tr:nth-child(even){background-color: #f2f2f2;}
        
        #products tr:hover {background-color: #ddd;}
        
        #products th {
          padding-top: 12px;
          padding-bottom: 12px;
          text-align: left;
          background-color: #490112;
          color: white;
        }
        </style>

## Hello {{$user->first_name}},

{{$message}}
<hr/>
Product due info:<br/>

<table id="products">
    <tr>
      <td>Product</td>
      <td>{{$orderItem->products->name}}</td>
    </tr>
    <tr>
        <td>Qty</td>
        <td>{{$orderItem->quantity}}</td>
    </tr>
    <tr>
        <td>Order Ref</td>
        <td>{{$orderItem->order->reference}}</td>
    </tr>
    <tr>
        <td colspan="2">
            Due since <strong>{{ Carbon\Carbon::parse($orderItem->rent_stop)->toDayDateTimeString()}}</strong> 
        </td>
    </tr>
</table>


Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
