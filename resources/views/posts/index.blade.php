@extends("layouts.app")
@section("title", "Tous les articles")
@section("content")

<div class="container mt-5">
    <h1 class="mb-4">Tous les articles</h1>

    <p>

        <a href="{{ route('posts.create') }}" class="btn btn-primary" title="Créer un article">Créer un nouveau post</a>
    </p>


    <table class="table table-bordered table-striped mt-4">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Titre</th>
                <th scope="col">Fichier</th>
                <th scope="col" colspan="2" class="text-center">Opérations</th>
            </tr>
        </thead>
        <tbody>
            <!-- On parcourt la collection de Post -->
            @foreach ($posts as $post)



            <tr>
                <td>
                    <!-- Lien pour afficher un Post -->
                    <a href="{{ route('posts.show', $post) }}" title="Lire l'article">{{ $post->title }}</a>
                </td>

                <td class="text-center">
                    @if($post->picture)

                    <img src="{{ Storage::disk('s3')->url($post->picture) }}" alt="{{ basename($post->picture) }}" class="img-thumbnail" width="150">
                    @else
                    <span class="text-muted">Aucune image</span>
                    @endif
                </td>

                <td class="text-center">
                    <!-- Bouton pour modifier un Post -->
                    <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning" title="Modifier l'article">Modifier</a>
                </td>

                <td class="text-center">
                    <!-- Formulaire pour supprimer un Post -->
                    <form method="POST" action="{{ route('posts.destroy', $post) }}" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?');">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
