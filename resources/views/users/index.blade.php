@extends('layouts.tabler')

@section('content')
<!-- Cabeçalho da Página -->
<div class="page-header d-print-none mb-4">
    <div class="row align-items-center">
        <div class="col">
            <h2 class="page-title">Gestão de Usuários</h2>
            <div class="text-muted mt-1">Listagem e gerenciamento de acessos de usuários.</div>
        </div>
        <!-- Botão Novo Registro -->
        <div class="col-auto ms-auto d-print-none">
            <a href="{{ route('users.create') }}" class="btn btn-primary">
                <i class="ti ti-plus me-1"></i> Novo Usuário
            </a>
        </div>
    </div>
</div>

<!-- Card com Tabela -->
<div class="card">
    <div class="table-responsive">
        <table class="table table-vcenter card-table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Perfil (Role)</th>
                    <th class="w-1">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td class="text-muted">{{ $user->email }}</td>
                        <td>
                            @foreach($user->roles as $role)
                                <span class="badge bg-blue-lt">{{ $role->name }}</span>
                            @endforeach
                        </td>
                        <td>
                            <div class="btn-list flex-nowrap">
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-outline-secondary">
                                    Editar
                                </a>
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Deseja excluir?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        Excluir
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted py-4">
                            Nenhum registro encontrado.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    <!-- Paginação (se houver) -->
    @if(method_exists($users, 'links'))
        <div class="card-footer d-flex align-items-center">
            {{ $users->links('pagination::bootstrap-5') }}
        </div>
    @endif
</div>
@endsection