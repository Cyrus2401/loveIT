@extends('layouts.master')

@section('container')
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Liste des admins</h2>
        </div>

        @if($message = Session::get('success'))
            
            <div class="alert alert-success">{{ $message }}</div>
            
        @endif

        <div class="row" data-aos="fade-up" data-aos-delay="100">

            @if (count($admins) > 0)

                <table id="table" class="" style="width:100%">
                    <thead>
                        <tr>
                            <th>Pseudo</th>
                            <th>Email</th>
                            <th>Admin depuis le</th>
                            <th>Statut</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($admins as $admin)

                            <tr>
                                <td>{{ $admin->pseudo }}</td>
                                <td>{{ $admin->email }}</td>
                                <td>{{ $admin->created_at->format('d/m/Y à H:i') }}</td>
                                
                                @if($admin->statut == 1)
                                    <td class="mt-2 badge bg-success">Activé</td>
                                @else
                                    <td class="mt-2 badge bg-danger">Désactivé</td>
                                @endif

                                @if($admin->statut == 1)
                                    <td>
                                        <button value={{ $admin->id }} class="btn btn-danger btn-sm showDisableAdminModal">Désactiver</button>
                                    </td>
                                @else
                                    <td>
                                        <button value={{ $admin->id }} class="btn btn-success btn-sm showAbleAdminModal">Activer</button>
                                    </td>
                                @endif
                            </tr>
                        
                        @endforeach
            
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Pseudo</th>
                            <th>Email</th>
                            <th>Admin depuis le</th>
                            <th>Statut</th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>
                
            @else

                <div class="alert alert-info">Il n'y a aucun admin dans le système actuellement !</div>

            @endif

            
        </div>

        </div>
    </section><!-- End Contact Section -->

    {{-- Modal de desactivation de l'admin --}}
    <div class="modal fade" id="disableAdminModal" tabindex="-1" aria-labelledby="disableAdminModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="disableAdminModalLabel">DESACTIVATION DE L'ADMIN</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                Voulez-vous vraiment désactiver cet admin ? 
                </div>
                <form action="/disableAdmin/" id="disableUserForm" method="POST">
                    @csrf
                    <div class="modal-footer">
                        <button type="submit" href="" class="btn btn-primary">Confirmer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
'
    {{-- Modal d'activation de l'admin --}}
    <div class="modal fade" id="ableAdminModal" tabindex="-1" aria-labelledby="ableAdminModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="ableAdminModalLabel">ACTIVATION DE L'ADMIN</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                Voulez-vous vraiment activer cet admin ? 
                </div>
                <form action="/ableAdmin/" id="ableUserForm" method="POST">
                    @csrf
                    <div class="modal-footer">
                        <button type="submit" href="" class="btn btn-primary">Confirmer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>

        $('.showDisableAdminModal').on('click', function() {

            var val = $(this).val()
           
            $('#disableAdminModal').modal('show');
            $('#disableUserForm').attr('action', '/disableAdmin/' + val)

        })

        $('.showAbleAdminModal').on('click', function() {

            var val = $(this).val()

            $('#ableAdminModal').modal('show');
            $('#ableUserForm').attr('action', '/ableAdmin/' + val)

        })
        
        
    </script>
@endsection