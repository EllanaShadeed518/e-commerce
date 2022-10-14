<section class="product_section layout_padding">
    <div class="container">
       <div class="heading_container heading_center">
          <h2>
             Our <span>products</span>
          </h2>
       </div>
       <div class="row">
       @forelse ($dataproduct as $dataproducts)



          <div class="col-sm-6 col-md-4 col-lg-4">
             <div class="box">
                <div class="option_container">
                   <div class="options">
                      <a href="{{route('DetailesProduct',['product'=>$dataproducts->id])}}" class="option1">
                      Detailes Product
                      </a>
                      <form action="{{url('product/addcart',['product'=>$dataproducts->id])}}" method="post">
                        @csrf
                      <input type="number" name="quantityorder" style="width:60px" class="option2" min="1" value="1">
                    <button type="submit" class ="option2">AddCart</button></form>
                   </div>
                </div>
                <div class="img-box">
                   <img src="{{asset("storage/$dataproducts->image")}}" alt="">
                </div>
                <div class="detail-box">
                   <h5>
                     {{$dataproducts->name}}
                   </h5>
                   <h6>
                    {{$dataproducts->price}}
                   </h6>
                </div>
             </div>
          </div>

          @empty

          @endforelse
          {{$dataproduct->links()}}

       </div>

       <div class="btn-box">
          <a href="{{url('viewallproduct')}}">
          View All products
          </a>
       </div>
    </div>
 </section>
