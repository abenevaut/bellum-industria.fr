@extends('cvepdb.multigaming.layouts.default')

@section('content')

<!-- Begin Gray Wrapper -->
<div class="layout__body-wrapper__content-wrapper layout__body-wrapper__content-wrapper--even">
    <!-- Begin Inner -->
    <div class="layout__body-wrapper__content-wrapper__inner">



        <h2 class="colored">Liste des commandes</h2>

        <div class="one-third">
            <ul>
                <li>
                    <h3>!points</h3>
                    <p>Command to see current points</p>
                </li>
                <li>
                    <h3>!info</h3>
                    <p>Command to see infos about stamm</p>
                </li>
            </ul>
        </div>
        <div class="one-third">
            <ul>
                <li>
                    <h3>!rank</h3>
                    <p>Command for VIP Rank</p>
                </li>
                <li>
                    <h3>!top</h3>
                    <p>Command for VIP Top 10</p>
                </li>
            </ul>
        </div>
        <div class="one-third last">
            <ul>
                <li>
                    <h3>!config</h3>
                    <p>Command to put ones features on/off</p>
                </li>
                <li>
                    <h3>!vipadmin</h3>
                    <p>Command for Admin Menu</p>
                </li>
            </ul>
        </div>

        <div class="clear"></div>

    </div>
    <!-- Begin Inner -->
</div>
<!-- End Gray Wrapper -->

<!-- Begin White Wrapper -->
<div class="layout__body-wrapper__content-wrapper layout__body-wrapper__content-wrapper--odd">
    <!-- Begin Inner -->
    <div class="layout__body-wrapper__content-wrapper__inner">





        <h2 class="colored">Liste des grades</h2>

        <div class="toggle">
            <h4 class="title">Noobs</h4>
            <div class="togglebox">
                <div>


                    <h3>Soldat, 10 points</h3>

                    <ul>
                        <li>Son a la connection au serveur (VIP joinsound)</li>
                    </ul>
                    <h3>Caporal, 50 points</h3>

                    <ul>
                        <li>Message d&#39;accueil et de depart (VIP welcome and leave message)</li>
                    </ul>

                    <h3>Caporal-chef, 100 points</h3>

                    <ul>
                        <li>Coming soon</li>
                    </ul>

                </div>
            </div>
        </div>

        <div class="toggle">
            <h4 class="title">Click to title</h4>
            <div class="togglebox">
                <div>

                    <h3>Sergent, 200 points</h3>

                    <ul>
                        <li>Faisceau lumineux qui suit les grenades (VIP grenade trail)</li>
                    </ul>

                    <h3>Sergent-chef, 300 points</h3>

                    <ul>
                        <li>Coming soon</li>
                    </ul>

                    <h3>Adjudant, 400 points</h3>

                    <ul>
                        <li>Coming soon</li>
                    </ul>

                    <h3>Adjudant-chef, 500 points</h3>

                    <ul>
                        <li>Coming soon</li>
                    </ul>

                    <h3>Major, 600 points</h3>

                    <ul>
                        <li>Coming soon</li>
                    </ul>

                </div>
            </div>
        </div>

        <div class="toggle">
            <h4 class="title">Click to title</h4>
            <div class="togglebox">
                <div>

                    <h3>Aspirant, 800 points</h3>

                    <ul>
                        <li>Coming soon</li>
                    </ul>

                    <h3>Sous-lieutenant, 1000 points</h3>

                    <ul>
                        <li>Coming soon</li>
                    </ul>

                    <h3>Lieutenant, 1200 points</h3>

                    <ul>
                        <li>Coming soon</li>
                    </ul>
                    <h3>Capitaine, 1400 points</h3>

                    <ul>
                        <li>Coming soon</li>
                    </ul>

                </div>
            </div>
        </div>

        <div class="toggle">
            <h4 class="title">Click to title</h4>
            <div class="togglebox">
                <div>

                    <h3>Commandant, 1700 points</h3>

                    <ul>
                        <li>Coming soon</li>
                    </ul>
                    <h3>Lieutenant-colonel, 2000 points</h3>

                    <ul>
                        <li>Coming soon</li>
                    </ul>

                    <h3>Colonel, 2300 points</h3>

                    <ul>
                        <li>Coming soon</li>
                    </ul>

                </div>
            </div>
        </div>


        <div class="toggle">
            <h4 class="title">Addicted Gamers</h4>
            <div class="togglebox">
                <div>


                    <h3>G&eacute;n&eacute;ral de brigade, 2700 points</h3>

                    <ul>
                        <li>Coming soon</li>
                    </ul>
                    <h3>G&eacute;n&eacute;ral de division, 3100 points</h3>

                    <ul>
                        <li>Coming soon</li>
                    </ul>

                    <h3>G&eacute;n&eacute;ral de corps d&#39;arm&eacute;e, 3500 points</h3>

                    <ul>
                        <li>Coming soon</li>
                    </ul>

                </div>
            </div>
        </div>

        <div class="toggle">
            <h4 class="title">#CVEPDB Fan Boys</h4>
            <div class="togglebox">
                <div>

                    <h3>G&eacute;n&eacute;ral d&#39;arm&eacute;e, 4000 points</h3>

                    <ul>
                        <li>Coming soon</li>
                    </ul>


                </div>
            </div>
        </div>

        <div class="clear"></div>

    </div>
    <!-- Begin Inner -->
</div>
<!-- End White Wrapper -->

<!-- Begin Grey Wrapper -->
<div class="layout__body-wrapper__content-wrapper layout__body-wrapper__content-wrapper--even">
    <!-- Begin Inner -->
    <div class="layout__body-wrapper__content-wrapper__inner">



        @include('cvepdb.multigaming.partials.share_inline')


    </div>
    <!-- Begin Inner -->
</div>
<!-- End Grey Wrapper -->

@stop