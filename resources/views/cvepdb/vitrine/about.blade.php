@extends('cvepdb.vitrine.layouts.default')

@section('content')
<!-- Begin Gray Wrapper -->
<div class="layout__body-wrapper__content-wrapper layout__body-wrapper__content-wrapper--even layout__body-wrapper__content-wrapper--intro">
    <!-- Begin Inner -->
    <div class="layout__body-wrapper__content-wrapper__inner layout__body-wrapper__content-wrapper__inner--intro">
        <p>{!! trans('cvepdb/vitrine/about.title') !!}</p>
    </div>
    <!-- End Inner -->
</div>
<!-- End Gray Wrapper -->
<!-- Begin White Wrapper -->
<div class="layout__body-wrapper__content-wrapper layout__body-wrapper__content-wrapper--odd">
    <!-- Begin Inner -->
    <div class="layout__body-wrapper__content-wrapper__inner">


        <div class="one-third center">
            <img src="" class="margin" alt="Avatar">
            <h5>{!! trans('cvepdb/global.cvepdb_author') !!} <span>{!! trans('cvepdb/global.cvepdb_author_grade') !!}</span></h5>


            <p>{!! trans('cvepdb/vitrine/about.intro') !!}</p>


            <ul class="social team">
                <li><a href="https://github.com/42antoine" target="_blank"><i class="icon-s-github"></i></a></li>
                <li><a href="https://plus.google.com/u/0/b/111705473242712184339/111705473242712184339/posts" target="_blank"><i class="icon-s-gplus"></i></a></li>
                <li><a href="http://fr.linkedin.com/pub/antoine-benevaut/36/39b/53a" target="_blank"><i class="icon-linkedin-squared"></i></a></li>
                <li><a href="https://twitter.com/42_antoine" target="_blank"><i class="icon-s-twitter"></i></a></li>
                <li><a href="https://soundcloud.com/42_antoine" target="_blank"><i class="icon-s-soundcloud"></i></a></li>
            </ul>

            <ul>
                <li><b>{!! trans('cvepdb/global.siret') !!}</b> : {!! trans('cvepdb/global.cvepdb_siret') !!}</li>
            </ul>

        </div>


        <div class="two-third last">
            <h2 class="colored"> {!! trans('cvepdb/vitrine/about.title_general') !!}</h2>
            {!! trans('cvepdb/vitrine/about.description_general') !!}
            <div class="clear"></div>

            <!-- Begin Toggle -->
            <div class="toggle">
                <h4 class="title">{!! trans('cvepdb/vitrine/about.title_competence') !!}</h4>
                <div class="togglebox">
                    <div>
                        <div class="one-third">
                            <p>PHP <i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star-empty"></i></p>
                            <p>HTML <i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star-empty"></i></p>
                            <p>CSS <i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star-empty"></i><i class="icon-star-empty"></i></p>
                            <p>JS / jQuery <i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star-empty"></i></p>
                        </div>
                        <div class="one-third">
                            <p>UML <i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star-empty"></i><i class="icon-star-empty"></i></p>
                            <p>C / C++ <i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star-empty"></i></p>
                            <p>SHELL <i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star-empty"></i><i class="icon-star-empty"></i></p>
                            <p>BATCH <i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star-empty"></i><i class="icon-star-empty"></i></p>
                            <p>XLS <i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star-empty"></i><i class="icon-star-empty"></i></p>
                        </div>
                        <div class="one-third last">
                            <p>Windows <i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star-empty"></i><i class="icon-star-empty"></i></p>
                            <p>Linux <i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star-empty"></i></p>
                            <p>Mac <i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star-empty"></i></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Toggle -->
            <div class="clear"></div>

            <!-- Begin Toggle -->
            <div class="toggle">
                <h4 class="title">{!! trans('cvepdb/vitrine/about.title_epitech') !!}</h4>
                <div class="togglebox">
                    <div>{!! trans('cvepdb/vitrine/about.description_epitech') !!}</div>
                </div>
            </div>
            <!-- End Toggle -->
            <div class="clear"></div>

            <!-- Begin Toggle -->
            <div class="toggle">
                <h4 class="title">{!! trans('cvepdb/vitrine/about.title_uqar') !!}</h4>
                <div class="togglebox">
                    <div>{!! trans('cvepdb/vitrine/about.description_uqar') !!}</div>
                </div>
            </div>
            <!-- End Toggle -->
            <div class="clear"></div>

        </div>
        <div class="clear"></div>


    </div>
    <!-- Begin Inner -->
</div>
<!-- End White Wrapper -->
@stop