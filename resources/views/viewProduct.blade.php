@extends('layout')
@section('content')
                  
    <div class="container-fluid">  
      <div class="row" style="margin-top: 10px">
        <div class="col-md-2">
            <ul class="list-group">
                <li class="list-group-item active">Brands</li>
                <li class="list-group-item">Samsung</li>
                <li class="list-group-item">Apple</li>
                <li class="list-group-item">Oppo</li>
                <li class="list-group-item">XiaoMi</li>
            </ul>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-8">
            <div class="card border-0">
                <h5 class="card-title">Products</h5>                    <div class="row">
                <div class="row">
                  @foreach($Products as $Product)    
                        <div class="col-sm-4"> 
                            <div class="card h-45">
                                <div class="card-body">
                                    <h5 class="card-title">{{$Product->name}}</h5>
                                    <a href=""><img src="{{ asset('images/') }}/{{$Product->image}}" alt="{{$Product->name}}" class="img-fluid"></a>
                                    <div class="card-heading">RM {{$Product->price}} </div>
                                    <a href="{{ route('product.detail',['id'=>$Product->id])}}" class="btn btn-danger btn-xs">Add to Cart</a> 
                                </div>
                            </div>
                        </div>
                       @endforeach  
		                   </div>
                                    
                    </div>
                <div class="card card-footer">&copy; 2019</div>
                <nav aria-label="...">
                  <ul class="pagination pagination-sm" style="margin-top: 10px">
                    <li class="page-item active" aria-current="page">
                      <span class="page-link">
                        1
                        <span class="sr-only">(current)</span>
                      </span>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                  </ul>
                </nav>
                    
            </div>
        </div>
        <div class="col-md-1"></div>
      </div>
    </div>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  @endsection