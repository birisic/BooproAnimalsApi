<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite("resources/js/app.js")
</head>
<body>
    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-6 bg-light">
                <h3 class="text-center my-4">Create a new Link</h3>
                <form method="POST" action="/links/">
                    @csrf
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="url">Url:</label>
                                    <input name="url" id="url" type="text" value="{{ old("url") }}" class="w-100"/>
                                    @if($errors->has("url"))
                                        <p class="text-danger">{{ $errors->first("url") }}</p>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="publishAt">Publish At:</label>
                                    <input name="publishAt" id="publishAt" type="datetime-local" value="{{ old("publishAt") }}" class="w-100"/>
                                    @if($errors->has("publishAt"))
                                        <p class="text-danger">{{ $errors->first("publishAt") }}</p>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="deleteAt">Delete At:</label>
                                    <input name="deleteAt" id="deleteAt" type="datetime-local" value="{{ old("deleteAt") }}" class="w-100"/>
                                    @if($errors->has("deleteAt"))
                                        <p class="text-danger">{{ $errors->first("deleteAt") }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-2 mt-2">
                                <input type="submit" value="Create Link" class="rounded bg-success border-0 text-light"/>
                            </div>
                            @if(session("success"))
                                <div class="col-12 mt-2">
                                        <p class="text-success fw-bold">{{ session("success") }}</p>
                                </div>
                            @endif
                            @if(session("error"))
                                <div class="col-12 mt-2">
                                    <p class="text-danger fw-bold">{{ session("error") }}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>

        @if(!empty($links))
            <div class="row d-flex justify-content-center mt-5">
                <div class="col-6 bg-light">
                    <table class="w-100 table">
                        <thead>
                            <tr>
                                <th>Url</th>
                                <th>Internal Id</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($links as $link)
                                <tr>
                                    <td>{{ $link->url }}</td>
                                    <td><a href="http://localhost:8000/{{ $link->url }}" target="_blank">{{ $link->internal_id }}</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>
</body>
</html>
