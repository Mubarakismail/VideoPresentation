<div class="section landing-section">
    <div class="container">
        <div class="row">
            <div class="col-md-8 ml-auto mr-auto">
                <h2 class="text-center">Keep in touch?</h2>
                <form class="contact-form" action="{{route('contact.store')}}">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Name</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="nc-icon nc-single-02"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Name" name="name" required>
                            </div>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label>Email</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                    <i class="nc-icon nc-email-85"></i>
                                  </span>
                                </div>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" required>
                            </div>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <label>Message</label>
                    <textarea class="form-control @error('message') is-invalid @enderror" required name="message" rows="4" placeholder="Tell us your thoughts and feelings..."></textarea>
                    @error('message')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="row">
                        <div class="col-md-4 ml-auto mr-auto">
                            <button class="btn btn-danger btn-lg btn-fill">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
