<?php $executive = session()->get('executive')?>
@extends('layouts.directorLayout')
@section('title', 'Dashboard')
@section('picture', $executive['images'])
@section('name', $executive['name'])
@section('phone', $executive['phone'])


@section('content')
    <div class="row inbox-wrapper">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        @include(('inc.applicationSideNav'))
                        <div class="col-lg-9">
                            <div class="p-3 border-bottom">
                                <div class="row align-items-center">
                                    <div class="col-lg-6">
                                        <div class="d-flex align-items-end mb-2 mb-md-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-inbox text-muted me-2"><polyline points="22 12 16 12 14 15 10 15 8 12 2 12"></polyline><path d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"></path></svg>
                                            <h4 class="me-1">Applications</h4>
                                            <span class="text-muted">(2 new application)</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <input class="form-control" type="text" placeholder="Search application...">
                                            <button class="btn btn-light btn-icon" type="button" id="button-search-addon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="p-3 border-bottom d-flex align-items-center justify-content-between flex-wrap">
                                <div class="d-none d-md-flex align-items-center flex-wrap">
                                    <span class="me-2">Showing 1-10 of 253</span>
                                </div>
                                <div class="d-flex align-items-center justify-content-end flex-grow-1">

                                    <div class="btn-group">
                                        <button class="btn btn-outline-secondary btn-icon" type="button"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left"><polyline points="15 18 9 12 15 6"></polyline></svg></button>
                                        <button class="btn btn-outline-secondary btn-icon" type="button"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg></button>
                                    </div>
                                </div>
                            </div>
                            <div class="email-list">

                                <!-- email list item -->
                                <div class="email-list-item email-list-item--unread">
                                    <div class="email-list-actions">
                                        <a class="favorite" href="javascript:;"><span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg></span></a>
                                    </div>
                                    <a href="read.html" class="email-list-detail">
                                        <div class="content">
                                            <span class="from">Cedric Kelly</span>
                                            <p class="msg">Urgent - You forgot your keys in the class room, please come imediatly! Urgent - You forgot your keys in the class room, please come imediatly! Urgent - You forgot your keys in the class room, please come imediatly! Urgent - You forgot your keys in the class room, please come imediatly! Urgent - You forgot your keys in the class room, please come imediatly!</p>
                                        </div>
                                        <span class="date">
                            08 Jan
                          </span>
                                    </a>
                                </div>

                                <!-- email list item -->
                                <div class="email-list-item email-list-item--unread">
                                    <div class="email-list-actions">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input">
                                        </div>
                                        <a class="favorite" href="javascript:;"><span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg></span></a>
                                    </div>
                                    <a href="read.html" class="email-list-detail">
                                        <div class="content">
                                            <span class="from">Haley Kennedy</span>
                                            <p class="msg">In the criminal justice system, the people are represented by two separate yet equally important groups. The police who investigate crime and the district attorneys who prosecute the offenders. These are their stories.</p>
                                        </div>
                                        <span class="date">
                            <span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-paperclip"><path d="M21.44 11.05l-9.19 9.19a6 6 0 0 1-8.49-8.49l9.19-9.19a4 4 0 0 1 5.66 5.66l-9.2 9.19a2 2 0 0 1-2.83-2.83l8.49-8.48"></path></svg> </span>
                            12 Jan
                          </span>
                                    </a>
                                </div>

                                <!-- email list item -->
                                <div class="email-list-item">
                                    <div class="email-list-actions">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input">
                                        </div>
                                        <a class="favorite" href="javascript:;"><span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg></span></a>
                                    </div>
                                    <a href="read.html" class="email-list-detail">
                                        <div class="content">
                                            <span class="from">Bradley Greer</span>
                                            <p class="msg">The world looks mighty good to me, cause Tootsie Rolls are all I see. Whatever it is I think I see, becomes a Tootsie Roll to me! Tootsie Roll how I love your chocolatey chew, Tootsie Roll I think I'm in love with you. Whatever it is I think I see, becomes a Tootsie Roll to me!</p>
                                        </div>
                                        <span class="date">
                            <span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-paperclip"><path d="M21.44 11.05l-9.19 9.19a6 6 0 0 1-8.49-8.49l9.19-9.19a4 4 0 0 1 5.66 5.66l-9.2 9.19a2 2 0 0 1-2.83-2.83l8.49-8.48"></path></svg> </span>
                            14 Jan
                          </span>
                                    </a>
                                </div>

                                <!-- email list item -->
                                <div class="email-list-item">
                                    <div class="email-list-actions">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input">
                                        </div>
                                        <a class="favorite" href="#"><span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star text-warning"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg></span></a>
                                    </div>
                                    <a href="read.html" class="email-list-detail">
                                        <div class="content">
                                            <span class="from">Brenden Wagner</span>
                                            <p class="msg">I am Duncan Macleod, born 400 years ago in the Highlands of Scotland. I am Immortal, and I am not alone. For centuries, we have waited for the time of the Gathering when the stroke of a sword and the fall of a head will release the power of the Quickening. In the end, there can be only one.</p>
                                        </div>
                                        <span class="date">
                            <span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-paperclip"><path d="M21.44 11.05l-9.19 9.19a6 6 0 0 1-8.49-8.49l9.19-9.19a4 4 0 0 1 5.66 5.66l-9.2 9.19a2 2 0 0 1-2.83-2.83l8.49-8.48"></path></svg> </span>
                            28 Jan
                          </span>
                                    </a>
                                </div>

                                <!-- email list item -->
                                <div class="email-list-item">
                                    <div class="email-list-actions">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input">
                                        </div>
                                        <a class="favorite" href="javascript:;"><span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg></span></a>
                                    </div>
                                    <a href="read.html" class="email-list-detail">
                                        <div class="content">
                                            <span class="from">Bruno Nash</span>
                                            <p class="msg">You unlock this door with the key of imagination. Beyond it is another dimension: a dimension of sound, a dimension of sight, a dimension of mind. You're moving into a land of both shadow and substance, of things and ideas; you've just crossed over into the Twilight Zone.</p>
                                        </div>
                                        <span class="date">
                            05 Feb
                          </span>
                                    </a>
                                </div>

                                <!-- email list item -->
                                <div class="email-list-item">
                                    <div class="email-list-actions">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input">
                                        </div>
                                        <a class="favorite" href="javascript:;"><span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg></span></a>
                                    </div>
                                    <a href="read.html" class="email-list-detail">
                                        <div class="content">
                                            <span class="from">Sonya Frost</span>
                                            <p class="msg">Gathered together from the cosmic reaches of the universe, here in this great Hall of Justice, are the most powerful forces of good ever assembled: Superman! Batman and Robin! Wonder Woman! Aquaman! And The Wonder Twins: Zan and Jayna, with their space monkey, Gleek! Dedicated to prove justice and peace for all mankind!</p>
                                        </div>
                                        <span class="date">
                            13 Feb
                          </span>
                                    </a>
                                </div>

                                <!-- email list item -->
                                <div class="email-list-item">
                                    <div class="email-list-actions">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input">
                                        </div>
                                        <a class="favorite" href="#"><span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star text-warning"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg></span></a>
                                    </div>
                                    <a href="read.html" class="email-list-detail">
                                        <div class="content">
                                            <span class="from">Cedric Kelly</span>
                                            <p class="msg">Sometimes the world looks perfect, nothing to rearrange. Sometimes you just, get a feeling like you need some kind of change. No matter what the odds are this time, nothing's going to stand in my way. This flame in my heart, and a long lost friend gives every dark street a light at the end. Standing tall, on the wings of my dream. Rise and fall, on the wings of my dream. The rain and thunder, the wind and haze. I'm bound for better days. It's my life and my dream, nothing's going to stop me now.</p>
                                        </div>
                                        <span class="date">
                            <span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-paperclip"><path d="M21.44 11.05l-9.19 9.19a6 6 0 0 1-8.49-8.49l9.19-9.19a4 4 0 0 1 5.66 5.66l-9.2 9.19a2 2 0 0 1-2.83-2.83l8.49-8.48"></path></svg> </span>
                            18 Feb
                          </span>
                                    </a>
                                </div>

                                <!-- email list item -->
                                <div class="email-list-item">
                                    <div class="email-list-actions">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input">
                                        </div>
                                        <a class="favorite" href="#"><span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star text-warning"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg></span></a>
                                    </div>
                                    <a href="read.html" class="email-list-detail">
                                        <div class="content">
                                            <span class="from">Haley Kennedy</span>
                                            <p class="msg">Once in every lifetime, comes a love like this. Oh I need you, you need me, oh my darling can't you see. Young Ones. Darling we're the Young Ones. Young Ones. Shouldn't be afraid. To live, love, there's a song to be sung. Cause we may not be the Young Ones very long.</p>
                                        </div>
                                        <span class="date">
                            22 Feb
                          </span>
                                    </a>
                                </div>

                                <!-- email list item -->
                                <div class="email-list-item">
                                    <div class="email-list-actions">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input">
                                        </div>
                                        <a class="favorite" href="javascript:;"><span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg></span></a>
                                    </div>
                                    <a href="read.html" class="email-list-detail">
                                        <div class="content">
                                            <span class="from">Bradley Greer</span>
                                            <p class="msg">Enter at your peril, past the vaulted door. Impossible things will happen that the world's never seen before. In Dexter's laboratory lives the smartest boy you've ever seen, but Dee Dee blows his experiments to Smithereens! There's gloom and doom when things go boom in Dexter's lab!</p>
                                        </div>
                                        <span class="date">
                            <span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-paperclip"><path d="M21.44 11.05l-9.19 9.19a6 6 0 0 1-8.49-8.49l9.19-9.19a4 4 0 0 1 5.66 5.66l-9.2 9.19a2 2 0 0 1-2.83-2.83l8.49-8.48"></path></svg> </span>
                            01 Mar
                          </span>
                                    </a>
                                </div>

                                <!-- email list item -->
                                <div class="email-list-item">
                                    <div class="email-list-actions">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input">
                                        </div>
                                        <a class="favorite" href="javascript:;"><span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg></span></a>
                                    </div>
                                    <a href="read.html" class="email-list-detail">
                                        <div class="content">
                                            <span class="from">Brenden Wagner</span>
                                            <p class="msg">Hot dogs, Armour hot dogs. What kind of kids eat Armour hot dogs? Fat kids, skinny kids, kids who climb on rocks. Tough kids, sissy kids, even kids with chicken pox love hot dogs, Armour hot dogs... The dogs kids love to bite!</p>
                                        </div>
                                        <span class="date">
                            <span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-paperclip"><path d="M21.44 11.05l-9.19 9.19a6 6 0 0 1-8.49-8.49l9.19-9.19a4 4 0 0 1 5.66 5.66l-9.2 9.19a2 2 0 0 1-2.83-2.83l8.49-8.48"></path></svg> </span>
                            07 Mar
                          </span>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
