@extends('layouts.app')

@section('content')

    <?php
    // \Stripe\Stripe::setApiKey('sk_test_vXL7sAvKsKOoQTbZHJu9iFum');
    // $plan = \Stripe\Plan::retrieve("nest-3");
    // dd($plan);
    ?>

    <div class="container">
        <div class="content">
            <h1>List Your Properties With Nest!</h1>

            <h4>Why list with Nest?</h4>
            <p>Nest is the new kid on the block, backed by some of the strongest technologies available,
                and we're constantly improving.  Built by a bunch of nerds that make a living building
                complex data management systems and consumer websites, Nest is powerful enough to keep
                up with the big boys without being so complicated it has to come with an owners manual to operate.</p>
            <p>Use Nest as your primary storefront or as a listing service; the choice is yours.  (We
                don't charge extra for putting <strong>your</strong> properties on <strong>your</strong>
                site, either!)  Actually, you'll find there are a lot of things we don't charge for that
                some others do.  Don't get us wrong, we like to eat, too, we just don't think every meal
                has to be lobster and steak.</p>

            <h4>Are you going to need a PHD to use this thing?</h4>
            <p>No.  And you shouldn't have to.  We believe that there is no reason to make this complicated,
                so we've made the interface as simple as possible to understand and broken things up so that
                you're not bombarded with a million buttons and textfields.  We even have a little "help me, I'm lost" button!</p>

            <h4>Are we skirting around the pricing?</h4>
            <p>Nope!  We're actually pretty proud of it.  We've got 3 plans to choose from, so we're confident
                 we have one that will fit you.  Check this out:</p>

            <div class="columns">
                <div class="column">
                    <div class="card">
                        <header class="card-header">
                            <p class="card-header-title">
                                Casual Plan
                            </p>
                        </header>
                        <div class="card-content">
                            <div class="content">
                                <h1 style="text-align:center; font-size:3rem;">$24.99<sup>*</sup></h1>
                                Made for managers with only a few properties, but with all the features the
                                big guys use.
                                <ul>
                                    <li>Up to 5 properties</li>
                                    <li>$250 setup fee</li>
                                </ul>
                            </div>
                            <small><p class="help">* = Monthly price.  Accounts can be upgraded at any time.  Upgraded accounts
                            will be charged the difference of the plan amounts upon upgrade.</p></small>
                        </div>
                        <footer class="card-footer">
                            <a href="{{ route('list.step.one', ['plan_id' => 'nest-1']) }}" class="card-footer-item">Sign Up</a>
                        </footer>
                    </div>
                </div>

                <div class="column">
                    <div class="card">
                        <header class="card-header">
                            <p class="card-header-title">
                                Intermediate Plan
                            </p>
                        </header>
                        <div class="card-content">
                            <div class="content">
                                <h1 style="text-align:center; font-size:3rem;">$99.99<sup>*</sup></h1>
                                Perfect for medium sized managers
                                <ul>
                                    <li>Up to 35 properties</li>
                                    <li>$500 setup fee</li>
                                </ul>
                            </div>
                            <small><p class="help">* = Monthly price.  Accounts can be upgraded at any time.  Upgraded accounts
                            will be charged the difference of the plan amounts upon upgrade.</p></small>
                        </div>
                        <footer class="card-footer">
                            <a href="{{ route('list.step.one', ['plan_id' => 'nest-2']) }}" class="card-footer-item">Sign Up</a>
                        </footer>
                    </div>
                </div>

                <div class="column">
                    <div class="card">
                        <header class="card-header">
                            <p class="card-header-title">
                                Professional Plan
                            </p>
                        </header>
                        <div class="card-content">
                            <div class="content">
                                <h1 style="text-align:center; font-size:3rem;">$159.99<sup>*</sup></h1>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec iaculis mauris.
                                <ul>
                                    <li>Up to 150 properties</li>
                                    <li>$1,500 setup fee</li>
                                </ul>
                            </div>
                            <small><p class="help">* = Monthly price.  Accounts can be upgraded at any time.  Upgraded accounts
                            will be charged the difference of the plan amounts upon upgrade.</p></small>
                        </div>
                        <footer class="card-footer">
                            <a href="{{ route('list.step.one', ['plan_id' => 'nest-3']) }}" class="card-footer-item">Sign Up</a>
                        </footer>
                    </div>
                </div>
            </div>

            <p>Have more than 150 properties?  No problem.  Just send us an email below to let us know you're interested
            in Enterprise Pricing and tell us how many properties you have.</p>

            <p>You're probably thinking there's a catch.  Well, there isn't.  We won't restrict how many photos you can have,
                there are no hidden fees or surprise charges, and every property you list is branded as your listing with links
                to your website at no additional cost.  You're supposed to be making money, not shelling it out for a few more
                photos!</p>

            <p>Nest uses <a href="https://www.stripe.com" target="_blank">Stripe</a> for payment delivery, connecting directly
                to your bank account to remove the need for an expensive merchant account.  We even have a WordPress plugin
                for your website!  List your properties on Nest and have them instantly available on your website!</p>

            <h4>Still have questions?  Drop us a line!</h4>

            <form action="#">
                <small>
                    <p class="help">All fields required</p>
                </small>
                <div class="columns">
                    <div class="column">
                        <div class="field">
                            <label for="name" class="label">Your Name</label>
                            <p class="control">
                                <input type="text" name="name" id="name" class="input
                                {{ $errors->has('name') ? 'is-danger' : '' }}" value="{{ old('name') }}">
                            </p>
                            @if($errors->has('name'))
                                <p class="help is-danger">{{ $errors->first('name') }}</p>
                            @endif
                        </div>
                    </div>

                    <div class="column">
                        <div class="field">
                            <label for="email" class="label">Email Address</label>
                            <p class="control">
                                <input type="text" name="email" id="email" class="input
                                {{ $errors->has('email') ? 'is-danger' : '' }}" value="{{ old('email') }}">
                            </p>
                            @if($errors->has('email'))
                                <p class="help is-danger">{{ $errors->first('email') }}</p>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="columns">
                    <div class="column">
                        <div class="field">
                            <label for="phone" class="label">Phone</label>
                            <p class="control">
                                <input type="text" name="phone" id="phone" class="input
                                {{ $errors->has('phone') ? 'is-danger' : '' }}" value="{{ old('phone') }}">
                            </p>
                            @if($errors->has('phone'))
                                <p class="help is-danger">{{ $errors->first('phone') }}</p>
                            @endif
                        </div>
                    </div>

                    <div class="column">
                        <div class="field">
                            <label for="url" class="label">Website</label>
                            <p class="control">
                                <input type="text" name="url" id="url" class="input
                                {{ $errors->has('url') ? 'is-danger' : '' }}" value="{{ old('url') }}">
                            </p>
                            @if($errors->has('url'))
                                <p class="help is-danger">{{ $errors->first('url') }}</p>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="field">
                    <label for="" class="label">Questions / Comments</label>
                    <p class="control">
                        <textarea name="message" id="message" cols="30" rows="10" class="textarea
                        {{ $errors->has('message') ? 'is-danger' : '' }}
                        "></textarea>
                    </p>
                    @if ($errors->has('message'))
                        {{ $errors->first('message') }}
                    @endif
                </div>

                <div class="columns is-centered m-t-30">
                    <div class="is-one-third">[CAPTCHA]</div>
                </div>
                <div class="columns is-centered m-t-30">
                    <div class="is-one-third">
                        <input type="submit" value="Contact Us" class="button is-success">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="container">
    </div>

@stop
