@extends('layouts.tabler')

@section('content')
<!-- Cabeçalho da Página -->
<div class="page-header d-print-none mb-4">
    <div class="row align-items-center">
        <div class="col">
            <h2 class="page-title">Gestão de Permissões</h2>
            <div class="text-muted mt-1">Cadastre e gerencie as permissões de acesso do sistema.</div>
        </div>
    </div>
</div>

<div class="row row-cards">
    <div class="col-12">
        <!-- Formulário para Nova Permissão -->
        <div class="card mb-4">
            <div class="card-body">
                <form action="{{ route('permissions.store') }}" method="POST" autocomplete="off">
                    @csrf
                    <div class="row g-2 align-items-center">
                        <div class="col-md-5 col-sm-8">
                            <input type="text" 
                                   name="name" 
                                   placeholder="Ex: users.create" 
                                   value="{{ old('name') }}"
                                   class="form-control @error('name') is-invalid @enderror" 
                                   required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary">
                                <i class="ti ti-plus me-1"></i> Cadastrar Permissão
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Tabela de Permissões -->
        <div class="card">
            <div class="table-responsive">
                <table class="table table-vcenter card-table table-hover">
                    <thead>
                        <tr>
                            <th class="w-1">ID</th>
                            <th>Nome da Permissão</th>
                            <th class="w-1 text-end">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($permissions as $permission)
                            <tr>
                                <td class="text-muted font-monospace">#{{ $permission->id }}</td>
                                <td class="font-weight-medium">
                                    <span class="badge bg-blue-lt">
                                        <i class="ti ti-key me-1"></i> {{ $permission->name }}
                                    </span>
                                </td>
                                <td class="text-end">
                                    <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST" onsubmit="return confirm('Tem certeza?');" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm">
                                            <i class="ti ti-trash me-1"></i> Excluir
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center py-4 text-muted">
                                    <i class="ti ti-key-off fs-1 text-muted d-block mb-2"></i>
                                    Nenhuma permissão cadastrada.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Paginação -->
            @if($permissions->hasPages())
                <div class="card-footer d-flex align-items-center">
                    {{ $permissions->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection