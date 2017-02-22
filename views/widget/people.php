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
</style>

<ul class="nav nav-tabs">
    <?php $first = true; foreach($departments as $title => $department): ?>
        <li <?php if($first) echo 'class="active"'; $first = false;  ?>>
            <a data-toggle="tab" href="#<?= $title ?>">
                <?= $title ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>


<div class="tab-content" style="padding: 15px 5px;">
    <?php $first = true; foreach($departments as $title => $department): ?>
        <div id="<?= $title ?>" class="tab-pane fade in <?php if($first) echo 'active'; $first = false; ?>">
            <?php foreach ($department as $person): ?>
                <div class="jb-person col-xs-12 col-sm-6 col-md-4 col-lg-3 text-center">
                    <h5 style="font-size: <?= isset($settings['textSize']) ? $settings['textSize'] : '14px' ?>;">
                        <?= isset($person['title']) ? $person['title'] : '' ?>
                    </h5>
                    <img src=
                         "<?= strlen($person['image']['src']) > 1
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
    <?php endforeach; ?>
</div>