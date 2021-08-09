<footer class="section-gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="footer-block">
                    <h3>Bravo</h3>
                    <p>Lorem ipsum dolor sit amet, conser adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a conser nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt. Aliquam erat volutpat. Curabitur convallis fringilla diam.</p>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="footer-block">
                    <h1>Contact Us</h1>

                    @php
                        $footerText = ['Address: 44 New Design Street', 'Email:info@gmail.com', 'Phone: +0477 85X6 552', 'Fax: +0477 85X6 552'];

                        $footerIcons = ['fas fa-map-marker', 'fas fa-envelope', 'fas fa-phone-alt', 'fas fa-fax'];
                    @endphp

                    <ul class="list-unstyled">
                        @for ($i = 0; $i < count($footerIcons); $i++)
                            <li class="d-flex mb-3">
                                <i class="{{ $footerIcons[$i] }} pr-3"></i>
                                {{ $footerText[$i] }}
                            </li>
                        @endfor
                    </ul>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="footer-block">
                    @php
                        $images = ['king-bed.jpg', 'family-bed.jpg', 'standard-bed.jpg', 'super-deluxe.jpg', 'triple-deluxe.jpg', 'standard-twins.jpg'];
                    @endphp

                    <h1>Gallery</h1>

                    <div class="row">
                        @for ($i = 0; $i < count($images); $i++)
                            <div class="col-lg-4">
                                <figure>
                                    <img src="{{ asset('images/' . $images[$i]) }}" alt="" class="img-fluid">
                                </figure>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="footer-block">
                    <h1>Newsletter</h1>
                    <div class="newsletter-wrapper">
                        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        <form action="">
                            <div class="form-group">
                                <input type="text" class="form-control rounded-0" placeholder="Enter your email">
                            </div>
                            <button type="submit" class="btn btn-primary d-block w-100 rounded-0">Signup</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="copyright">
    <div class="container text-center">
        <p class="mb-0">&copy; {{ date('Y') }} All Rights Reserved. Trade Trademarks and brands are the property of their respective owners.</p>
    </div>
</div>