@extends('layouts.app')
@section('content')

</script>
<style>
.carousel-inner > .item > img,
.carousel-inner > .item > a > img {
  width: 50%;
  margin: auto;
}
</style>
<sript>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">WelCome</div>
                <div class="panel-body">
                    You are logged in!
                </div>
                    <div id="myCarousel" class="carousel slide" 
                         data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                          <li data-target="#myCarousel" data-slide-to="1"></li>
                          <li data-target="#myCarousel" data-slide-to="2"></li>
                          <li data-target="#myCarousel" data-slide-to="3"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <img src="image/univ.jpeg" alt="Show" 
                                width="" height="">
                            </div>
                            <div class="item">
                                <img src="image/stud.jpeg" alt="Edit" 
                                width="" height="">
                            </div>
                        
                            <div class="item">
                                <img src="image/univ1.jpeg" alt="Delete" 
                                width="" height="">
                            </div>

                            <div class="item">
                                <img src="image/std1.jpeg" alt="Tweets" 
                                width="" height="">
                            </div>
                        </div>
                        <!-- Left and right controls -->
                        <a class="left carousel-control" href="#myCarousel" 
                        role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" 
                        aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                        </a>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection

  
  
  

 