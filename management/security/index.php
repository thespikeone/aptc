<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>portfolio grid with filter menu and isotopejs - Bootdey.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js" integrity="sha512-Zq2BOxyhvnRFXu0+WE6ojpZLOU2jdnqbrM1hmVdGzyeCa1DgM3X5Q4A/Is9xA1IkbUeDd7755dNNI/PzSf2Pew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center">
                    <ul class="col container-filter portfolioFilte list-unstyled mb-0" id="filter">
                        <li><a class="categories active" data-filter="*">All</a></li>

                    </ul>
                </div>
            </div>
        </div>

        <div class="port portfolio-masonry mt-4">
            <div class="portfolioContainer row photo">
               

                <div class="col-lg-4 p-4 branding coffee">
                    <div class="item-box">
                        <a class="mfp-image" href="https://via.placeholder.com/800x540/D3D3D3/000000" title="Project Name">
                            <img class="item-container img-fluid" src="https://via.placeholder.com/800x540/D3D3D3/000000" alt="work-img">
                            <div class="item-mask">
                                <div class="item-caption">
                                    <p class="text-dark mb-0">Coffee</p>
                                    <h6 class="text-dark mt-1 text-uppercase">PageMaker including</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>




          
             
          

             

               
            </div>
        </div>
    </div>
</section>

<style type="text/css">
body{margin-top:20px;}
.container-filter {
  margin-top: 0;
  margin-right: 0;
  margin-left: 0;
  margin-bottom: 30px;
  padding: 0;
  text-align: center;
}

.container-filter li {
  list-style: none;
  display: inline-block;
}

.container-filter a {
  display: block;
  font-size: 14px;
  margin: 10px 20px;
  text-transform: uppercase;
  cursor: pointer;
  font-weight: 400;
  line-height: 30px;
  -webkit-transition: all 0.6s;
  border-bottom: 1px solid transparent;
  color: #807c7c !important;
}

.container-filter a:hover {
  color: #222222 !important;
}

.container-filter a.active {
  color: #222222 !important;
  border-bottom: 1px solid #222222;
}

.item-box {
  position: relative;
  overflow: hidden;
  display: block;
}

.item-box a {
  display: inline-block;
}

.item-box .item-mask {
  background: none repeat scroll 0 0 rgba(255, 255, 255, 0.9);
  position: absolute;
  transition: all 0.5s ease-in-out 0s;
  -moz-transition: all 0.5s ease-in-out 0s;
  -webkit-transition: all 0.5s ease-in-out 0s;
  -o-transition: all 0.5s ease-in-out 0s;
  top: 10px;
  left: 10px;
  bottom: 10px;
  right: 10px;
  opacity: 0;
  visibility: hidden;
  overflow: hidden;
  text-align: center;
}

.item-box .item-mask .item-caption {
  position: absolute;
  width: 100%;
  bottom: 10px;
  opacity: 0;
}

.item-box:hover .item-mask {
  opacity: 1;
  visibility: visible;
  cursor: pointer !important;
}

.item-box:hover .item-caption {
  opacity: 1;
}

.item-box:hover .item-container {
  width: 100%;
}

.services-box {
  padding: 45px 25px 45px 25px;
}
</style>

<script type="text/javascript">
$(window).on('load', function() {
    var $container = $('.portfolioContainer');
    var $filter = $('#filter');
    $container.isotope({
        filter: '*',
        layoutMode: 'masonry',
        animationOptions: {
            duration: 750,
            easing: 'linear'
        }
    });
    $filter.find('a').click(function() {
        var selector = $(this).attr('data-filter');
        $filter.find('a').removeClass('active');
        $(this).addClass('active');
        $container.isotope({
            filter: selector,
            animationOptions: {
                animationDuration: 750,
                easing: 'linear',
                queue: false,
            }
        });
        return false;
    });
});

</script>
</body>
</html>