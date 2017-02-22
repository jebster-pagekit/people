<style>
    .img-circle{
        border: <?= isset($settings['borderSize']) ? $settings['borderSize'] : '3px' ?> solid <?= isset($settings['borderColor']) ? $settings['borderColor'] : '#D41A1A' ?>;
        box-shadow: 2px 2px 25px #D1D1D1;
        width: <?= isset($settings['imageSize']) ? $settings['imageSize'] : '200px' ?>;
        height: <?= isset($settings['imageSize']) ? $settings['imageSize'] : '200px' ?>;
    }
    .jb-person, jb-person > h5, .nav>li>a{
        color: <?= isset($settings['textColor']) ? $settings['textColor'] : '#D41A1A' ?>;
    }
    .nav-tabs > li{
        width: <?= 100/count($departments) ?>%;
    }

    #custom_carousel .item {

        color:#000;
        padding:20px 0;
    }
    #custom_carousel .controls{
        overflow-x: auto;
        overflow-y: hidden;
        padding:0;
        margin:0;
        white-space: nowrap;
        text-align: center;
        position: relative;
        background:#ddd
    }
    #custom_carousel .controls li {
        display: table-cell;
        width: 1%;
        max-width:90px
    }
    #custom_carousel .controls li.active {
        background-color:#eee;
        border-top: 3px solid <?= isset($settings['borderColor']) ? $settings['borderColor'] : '#D41A1A' ?>;
    }
    #custom_carousel .controls a small {
        overflow:hidden;
        display:block;
        font-size:10px;
        margin-top:5px;
        font-weight:bold
    }
</style>
<script>
    $(document).ready(function(ev){
        $('#custom_carousel').on('slide.bs.carousel', function (evt) {
            $('#custom_carousel .controls li.active').removeClass('active');
            $('#custom_carousel .controls li:eq('+$(evt.relatedTarget).index()+')').addClass('active');
        })
    });
</script>
<div class="container-fluid">
    <div id="custom_carousel" class="carousel slide">

        <div class="controls">
            <ul class="nav">
                <?php $i = 0; foreach($departments as $title => $department): if(count($department) == 0) continue; ?>
                    <li data-target="#custom_carousel" data-slide-to="<?= $i ?>" <?= $i==0 ? 'class="active"' : ''?>>
                        <a href="#">
                            <?= $title ?>
                        </a>
                    </li>
                <?php $i++; endforeach; ?>
            </ul>
        </div>
        <div class="carousel-inner">
            <?php $i = 0; foreach($departments as $title => $department): if(count($department) == 0) continue; ?>
                <div class="item row <?= $i==0 ? 'active' : '' ?>">
                    <?php foreach ($department as $person): ?>
                        <div class="jb-person col-xs-12 col-sm-6 col-md-4 col-lg-3 text-center">
                            <h5 style="font-size: <?= isset($settings['textSize']) ? $settings['textSize'] : '14px' ?>;">
                                <?= isset($person['title']) ? $person['title'] : '' ?>
                            </h5>
                            <img src=
                                 "<?= isset($person['image']) && strlen($person['image']['src']) > 1
                                     ? Pagekit\Application::url()->getStatic($person['image']['src'], [], 0)
                                     : '' ?>" class="img-circle">
                            <h5 style="font-size: <?= isset($settings['textSize']) ? $settings['textSize'] : '14px' ?>;">
                                <?= isset($person['name']) ? $person['name'] : '' ?>
                            </h5>
                            <h5 style="font-size: <?= isset($settings['textSize']) ? $settings['textSize'] : '14px' ?>;">
                                <?= isset($person['phone']) ? $person['phone'] : '' ?>
                            </h5>
                            <h5 style="font-size: <?= isset($settings['textSize']) ? $settings['textSize'] : '14px' ?>;">
                                <?= isset($person['email']) ? $person['email'] : '' ?>
                            </h5>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php $i++; endforeach; ?>
        </div>



    </div>
</div>



