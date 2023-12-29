<div class="row mb-3">
                            <label for="title" class="col-md-4 col-form-label text-md-end">News</label>
                            <div class="col-md-6">
                                @if (Strlen($news->message)>200)
                                <div id="smallDiv" style="display:block;">
                                    <h4 style="color: orange;">{{$news->title}}</h4>
                                    {{ Str::limit($news->message,200)}}
                                </div>
                                <div id="fullDiv" style="display:none;">
                                    <h4>{{$news->title}}</h4>
                                    <p>{{$news->message}}</p>
                                </div>
                                <button onclick="myFunction()" class="btn btn-warning">Show/hide</button>
                                <script>
                                    function myFunction() {
                                        event.preventDefault()
                                        var smallDiv = document.getElementById("smallDiv");
                                        var fullDiv = document.getElementById("fullDiv");
                                        if (smallDiv.style.display === "block") {
                                            smallDiv.style.display = "none";
                                            fullDiv.style.display = "block";
                                        } else {
                                            smallDiv.style.display = "block";
                                            fullDiv.style.display = "none";
                                        }
                                    }
                                </script>
                                @else
                                <h4>{{$news->title}}</h4>
                                <p>{{$news->message}}</p>
                                @endif

                            </div>
                        </div>