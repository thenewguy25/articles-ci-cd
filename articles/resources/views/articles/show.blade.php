<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $article->title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h2>{{ $article->title }}</h2>
                            <div class="btn-group" role="group">
                                <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('articles.destroy', $article->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Are you sure you want to delete this article?')">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <h5>Article Details</h5>
                                <table class="table table-borderless">
                                    <tr>
                                        <td><strong>ID:</strong></td>
                                        <td>{{ $article->id }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Author:</strong></td>
                                        <td>{{ $article->author }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Category:</strong></td>
                                        <td>
                                            <span class="badge bg-info">{{ ucfirst($article->category) }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Status:</strong></td>
                                        <td>
                                            <span
                                                class="badge bg-{{ $article->status === 'published' ? 'success' : ($article->status === 'draft' ? 'warning' : 'secondary') }}">
                                                {{ ucfirst($article->status) }}
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Created:</strong></td>
                                        <td>{{ $article->created_at->format('F d, Y \a\t g:i A') }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Updated:</strong></td>
                                        <td>{{ $article->updated_at->format('F d, Y \a\t g:i A') }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <div class="mb-4">
                            <h5>Content</h5>
                            <div class="border p-3 bg-light">
                                {!! nl2br(e($article->content)) !!}
                            </div>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                            <a href="{{ route('articles.index') }}" class="btn btn-secondary">Back to Articles</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>