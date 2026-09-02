@extends('layouts.tabler')

@section('content')
<!-- Cabeçalho da Página -->
<div class="page-header d-print-none mb-4">
    <div class="row align-items-center">
        <div class="col">
            <h2 class="page-title">Perfis de Acesso (Roles)</h2>
            <div class="text-muted mt-1">Gerencie os papéis e defina quais permissões cada perfil possui.</div>
        </div>
        <div class="col-auto ms-auto d-print-none">
            <a href="{{ route('roles.create') }}" class="btn btn-primary d-none d-sm-inline-block">
                <i class="ti ti-plus me-1"></i> Novo Perfil
            </a>
            <a href="{{ route('roles.create') }}" class="btn btn-primary d-sm-none btn-icon" aria-label="Novo Perfil">
                <i class="ti ti-plus"></i>
            </a>
        </div>
    </div>
</div>

<!-- Mensagem de Sucesso -->
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <div class="d-flex align-items-center">
            <i class="ti ti-check me-2 fs-2"></i>
            <div>{{ session('success') }}</div>
        </div>
        <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
    </div>
@endif

<!-- Tabela de Perfis -->
<div class="card">
    <div class="table-responsive">
        <table class="table table-vcenter card-table table-hover">
            <thead>
                <tr>
                    <th class="w-1">ID</th>
                    <th>Nome do Perfil</th>
                    <th>Permissões Vinculadas</th>
                    <th class="w-1 text-end">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($roles as $role)
                    <tr>
                        <td class="text-muted font-monospace">#{{ $role->id }}</td>
                        <td class="font-weight-bold">{{ $role->name }}</td>
                        <td>
                            <div class="d-flex flex-wrap gap-1">
                                @forelse($role->permissions as $perm)
                                    <span class="badge bg-blue-lt">
                                        {{ $perm->name }}
                                    </span>
                                @empty
                                    <span class="text-muted italic fs-5">Nenhuma permissão vinculada</span>
                                @endforelse
                            </div>
                        </td>
                        <td class="text-end">
                            <div class="btn-list flex-nowrap justify-content-end">
                                <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-outline-secondary btn-sm">
                                    <i class="ti ti-pencil me-1"></i> Editar
                                </a>
                                <form action="{{ route('roles.destroy', $role->id) }}" method="POST" onsubmit="return confirm('Tem certeza?');" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm">
                                        <i class="ti ti-trash me-1"></i> Excluir
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center py-4 text-muted">
                            <i class="ti ti-shield-off fs-1 text-muted d-block mb-2"></i>
                            Nenhum perfil cadastrado.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection