<?php

use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'Home';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Bem-vindo ao SisCar</h1>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Cadastrar Cliente</h2>

                <p>Aqui você faz o cadastro dos seus clientes</p>

                <p><?= Html::a('Acessar &raquo;', ['client/create'], ['class' => 'btn btn-primary']) ?></p>
            </div>
            <div class="col-lg-4">
                <h2>Cadastrar Veículo</h2>

                <p>Aqui você faz o cadastro de veículos</p>

                <p><?= Html::a('Acessar &raquo;', ['vehicle/create'], ['class' => 'btn btn-primary']) ?></p>
            </div>
            <div class="col-lg-4">
                <h2>Cadastrar Reparos</h2>

                <p>Aqui você faz o cadastro de reparos</p>

                <p><?= Html::a('Acessar &raquo;', ['repair/create'], ['class' => 'btn btn-primary']) ?></p>
            </div>
        </div>

    </div>
</div>
