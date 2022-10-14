
<!DOCTYPE html>
<htmL>
    <head>
        <title>Order Pdf</title>
    </head>
    <body>
        <div class="row">





            <div class="" align="center" >


               <div class="detail-box">
<h1> Details Of Order:</h1>
                  <h5 style="color:#FF69B4;font-size:15px;font-family:Lucida Console Courier, monospace;">
                      <label style="font-size: 17px ;color:black">
                      NameUser:</label> {{$orderid->name}}
                  </h5>
                  <br>
                  <h5 style="color:#FF69B4;font-size:15px;font-family:Lucida Console Courier, monospace;">
                    <label style="font-size: 17px ;color:black">
                    PhoneNum:</label> {{$orderid->phone}}
                </h5>
                <br>
                  <h5 style="color:#FF69B4;font-size:15px;font-family:Lucida Console Courier, monospace;">
                      <label style="font-size: 17px ;color:black">
                      Address: </label> {{$orderid->address}}
                    </h5>
                    <br>

                    <h5 style="color:#FF69B4;font-size:15px;font-family:Lucida Console Courier, monospace;">
                     <label style="font-size: 17px ;color:black">
                      ProductName:</label> {{$orderid->productname}}
                    </h5>
                    <br>

                    <h5 style="color:#FF69B4;font-size:15px;font-family:Lucida Console Courier, monospace;">
                      <label style="font-size: 17px ;color:black">
                      ProductPrice:</label> {{$orderid->price}}
                  </h5>
                  <h5 style="color:#FF69B4;font-size:15px;font-family:Lucida Console Courier, monospace;">
                    <label style="font-size: 17px ;color:black">
                     OrderQuantity:</label> {{$orderid->productquantity}}
                   </h5>
                   <br>

               </div>
            </div>




      </div>
</body>
   </html>
