@extends('layouts.app')

@section('content')

<div class="content-wrapper">
        <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">Ajouter des Administarteurs</h3>

            </div>
            <div class="col-sm-6" style="text-align: right;">
                <a class="nav-link btn btn-success create-new-button"  href="{{ url('admin/admin/add') }}">Ajouter un administrateur</a>
            </div>
            <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Basic form elements</h4>
                        <p class="card-description"> Basic form elements </p>

                        <form class="forms-sample"  action="" method="POST">
                            {{@csrf_field()}}
                            <div class="form-group">
                                <label >Nom</label>
                                <input type="text" class="form-control" name="nom" required placeholder="Nom">
                            </div>
                            <div class="form-group">
                                <label >address-Email </label>
                                <input type="text" class="form-control" name="email" required  placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label >Mot de passe</label>
                                <input type="password" class="form-control" name="password" required placeholder="Mot de passe">
                            </div>

                            <button type="submit" class="btn btn-primary mr-2">Soumettre</button>
                            <button class="btn btn-dark">Annuler</button>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
