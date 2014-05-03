<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\themes\adminLTE\AdminLteThemeAsset;


function startsWith($haystack, $needle)
{
     $length = strlen($needle);
     return (substr($haystack, 0, $length) === $needle);
}

/**
 * @var \yii\web\View $this
 * @var string $content
 */
AdminLteThemeAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <link rel="icon" type="image/x-icon" href="<?= Yii::getAlias('@web') ?>/favicon.ico" />
</head>
<body class="skin-blue">
    <?php $this->beginBody() ?>

    <!-- header logo: style can be found in header.less -->
    <header class="header">
        
        <!-- Add the class icon to your logo image or logo icon to add the margining -->
        <a href="<?= Yii::$app->homeUrl ?>" class="logo">Alba 2</a>
        
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
            
            <!-- Sidebar toggle button-->
            <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            
            <?php if (!Yii::$app->user->isGuest): ?>
            <div class="navbar-right">
                <ul class="nav navbar-nav">
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="glyphicon glyphicon-user"></i>
                            <span><?= Yii::$app->user->identity->username ?> <i class="caret"></i></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header bg-light-blue">
                                <img src="img/avatar3.png" class="img-circle" alt="User Image" />
                                <p>
                                    <?= Yii::$app->user->identity->username ?>
                                    <small>Member since Nov. 2012</small>
                                </p>
                            </li>
                            <!-- Menu Body -->
                            <!--
                            <li class="user-body">
                                <div class="col-xs-4 text-center">
                                    <a href="#">Followers</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#">Sales</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#">Friends</a>
                                </div>
                            </li>
                            -->
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <?= Html::a(Yii::t('app', 'Logout (' . Yii::$app->user->identity->username . ')'), ['/site/logout'], ['class' => 'btn btn-default btn-flat', 'data-method' => 'post']) ?>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <?php endif; ?>

        </nav>
    </header>

    <div class="wrapper row-offcanvas row-offcanvas-left">
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="left-side sidebar-offcanvas">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">

                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left info">
                    <?php if (Yii::$app->user->isGuest): ?>
                        <small><i class="fa fa-circle text-success"></i></small>
                        <?= Html::a(Yii::t('app', 'Login'), ['/site/login']) ?>
                    <?php else: ?>
                        <small><i class="fa fa-circle text-danger"></i></small>
                        <?= Html::a(Yii::t('app', 'Logout (' . Yii::$app->user->identity->username . ')'), ['/site/logout'], ['data-method' => 'post']) ?>
                    <?php endif; ?>
                    </div>
                </div>
                
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu">
                    <li class="active">
                        <a href="#">
                            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                        </a>
                    </li>

                    <li class="treeview<?php echo startsWith(Yii::$app->controller->route, 'administracion/establecimientos') ? ' active' : ''; ?>">
                        <a href="#">
                            <i class="fa fa-bar-chart-o"></i>
                            <span>Administración</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li class="<?php echo startsWith(Yii::$app->controller->route, 'administracion/establecimientos') ? ' active' : ''; ?>"><a href="<?= Url::to(['/administracion/establecimientos/index']) ?>"><i class="fa fa-angle-double-right"></i> <?= Yii::t('app', 'Establecimientos') ?></a></li>
                        </ul>
                    </li>

                    <li class="treeview<?php echo startsWith(Yii::$app->controller->route, 'administracion/alumnos') ? ' active' : ''; ?>">
                        <a href="<?= Url::to(['/administracion/datos']) ?>">
                            <i class="fa fa-user"></i> <span>Alumnos</span>
                            
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li class="<?php echo startsWith(Yii::$app->controller->route, 'administracion/alumnos/index') ? ' active' : ''; ?>"><a href="<?= Url::to(['/administracion/datos/tipos-documento']) ?>"><i class="fa fa-angle-double-right"></i> <?= Yii::t('app', 'Ver todos') ?></a></li>
                            <li class="<?php echo startsWith(Yii::$app->controller->route, 'administracion/alumnos/responsables') ? ' active' : ''; ?>"><a href="<?= Url::to(['/administracion/datos/tipos-documento']) ?>"><i class="fa fa-angle-double-right"></i> <?= Yii::t('app', 'Responsables') ?></a></li>
                            <li class="<?php echo startsWith(Yii::$app->controller->route, 'administracion/alumnos/inasistencias') ? ' active' : ''; ?>"><a href="<?= Url::to(['/administracion/datos/provincias']) ?>"><i class="fa fa-angle-double-right"></i> <?= Yii::t('app', 'Inasistencias') ?></a></li>
                            <li class="<?php echo startsWith(Yii::$app->controller->route, 'administracion/alumnos/notas') ? ' active' : ''; ?>"><a href="<?= Url::to(['/administracion/datos/ciudades']) ?>"><i class="fa fa-angle-double-right"></i> <?= Yii::t('app', 'Notas') ?></a></li>
                        </ul>
                    </li>

                    <li class="treeview<?php echo startsWith(Yii::$app->controller->route, 'administracion/datos') ? ' active' : ''; ?>">
                        <a href="<?= Url::to(['/administracion/datos']) ?>">
                            <i class="fa fa-edit"></i> <span>Datos</span>
                            
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li class="<?php echo startsWith(Yii::$app->controller->route, 'administracion/datos/paises') ? ' active' : ''; ?>"><a href="<?= Url::to(['/administracion/datos/paises']) ?>"><i class="fa fa-angle-double-right"></i> <?= Yii::t('app', 'Países') ?></a></li>
                            <li class="<?php echo startsWith(Yii::$app->controller->route, 'administracion/datos/provincias') ? ' active' : ''; ?>"><a href="<?= Url::to(['/administracion/datos/provincias']) ?>"><i class="fa fa-angle-double-right"></i> <?= Yii::t('app', 'Provincias') ?></a></li>
                            <li class="<?php echo startsWith(Yii::$app->controller->route, 'administracion/datos/ciudades') ? ' active' : ''; ?>"><a href="<?= Url::to(['/administracion/datos/ciudades']) ?>"><i class="fa fa-angle-double-right"></i> <?= Yii::t('app', 'Ciudades') ?></a></li>
                            <li class="<?php echo startsWith(Yii::$app->controller->route, 'administracion/datos/tipos-documento') ? ' active' : ''; ?>"><a href="<?= Url::to(['/administracion/datos/tipos-documento']) ?>"><i class="fa fa-angle-double-right"></i> <?= Yii::t('app', 'Tipos de Documento') ?></a></li>
                        </ul>
                    </li>

                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Right side column. Contains the navbar and content of the page -->
        <aside class="right-side">
            <!-- Content Header (Page header) -->
                <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    'options' => ['class' => 'breadcrumb small',]
                ]) ?>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-md-12" id="inner-content">
                        <?= $content ?>
                    </div>
                </div><!-- /.row (main row) -->
            </section><!-- /.content -->

        </aside><!-- /.right-side -->
    </div><!-- ./wrapper -->


    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; pressEnter <?= date('Y') ?></p>
            <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
