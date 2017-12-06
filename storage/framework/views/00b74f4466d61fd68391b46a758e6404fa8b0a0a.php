<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="content">
            <h1>List Your Properties With Nest!</h1>

            <h4>Why list with Nest?</h4>
            <p>Nest is the new kid on the block, backed by some of the strongest technologies available, and we're constantly improving.  Built by a bunch of nerds that make a living building complex data management systems and consumer websites, Nest is powerful enough to keep up with the big boys without being so complicated it has to come with an owners manual to operate.</p>
            <p>Use Nest as your primary storefront or as a listing service; the choice is yours.  (We don't charge extra for putting <strong>your</strong> properties on <strong>your</strong> site, either!)  Actually, you'll find there are a lot of things we don't charge for that some others do.  Don't get us wrong, we like to eat, too, we just don't think every meal has to be lobster and steak.</p>

            <h4>Are you going to need a PHD to use this thing?</h4>
            <p>No.  And you shouldn't have to.  We believe that there is no reason to make this complicated, so we've made the interface as simple as possible to understand and broken things up so that you're not bombarded with a million buttons and textfields.  We even have a little "help me, I'm lost" button!</p>

            <h4>Are we skirting around the pricing?</h4>
            <p>Nope!  We're actually pretty proud of it.  We've got 3 plans to choose from, so we're confident we have one that will fit you.  There is a pesky setup fee, but we offer a payment plan on it in certain circumstances.  Check this out:</p>

            <ul>
                <li>
                    Casual plan
                    <ul>
                        <li>$24.99/month</li>
                        <li>Up to 5 properties</li>
                        <li>$250 setup fee</li>
                    </ul>
                </li>
                <li>
                    Intermediate plan
                    <ul>
                        <li>$99.99/month</li>
                        <li>Up to 35 properties</li>
                        <li>$500 setup fee</li>
                    </ul>
                </li>
                <li>
                    Professional plan
                    <ul>
                        <li>$159.99/month</li>
                        <li>Up to 150 properties</li>
                        <li>$1,500 setup fee</li>
                    </ul>
                </li>
            </ul>

            <p>You're probably thinking there's a catch.  Well, there isn't.  We won't restrict how many photos you can have, there are no hidden fees or surprise charges, and every property you list is branded as your listing with links to your website at no additional cost.  You're supposed to be making money, not shelling it out for a few more photos!</p>

            <p>Nest uses <a href="https://www.stripe.com" target="_blank">Stripe</a> for payment delivery, connecting directly to your bank account to remove the need for an expensive merchant account.  We even have a WordPress plugin for your website!  List your properties on Nest and have them instantly available on your website!</p>

            <h4>Still have questions?  Drop us a line!</h4>
        </div>
    </div>

    <div class="container">
        <form action="#" class="form">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group<?php echo e(($errors->has('name')) ? '  has-error' : ''); ?>">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="<?php echo e(old('name')); ?>" required>
                        <?php if($errors->has('name')): ?>
                            <span class="help-block"><?php echo e($errors->first('name')); ?></span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group<?php echo e(($errors->has('email')) ? '  has-error' : ''); ?>">
                        <label for="email">Email Address</label>
                        <input type="text" name="email" id="email" class="form-control" value="<?php echo e(old('email')); ?>" required>
                        <?php if($errors->has('email')): ?>
                            <span class="help-block"><?php echo e($errors->first('email')); ?></span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group<?php echo e(($errors->has('phone')) ? '  has-error' : ''); ?>">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" id="phone" class="form-control" value="<?php echo e(old('phone')); ?>" required>
                        <?php if($errors->has('phone')): ?>
                            <span class="help-block"><?php echo e($errors->first('phone')); ?></span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="url">Website</label>
                        <input type="text" name="url" id="url" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group<?php echo e(($errors->has('comment')) ? '  has-error' : ''); ?>">
                        <label for="comment">Questions / Comments</label>
                        <textarea name="comment" id="comment" cols="30" rows="10" class="form-control" required><?php echo e(old('comment')); ?></textarea>
                        <?php if($errors->has('comment')): ?>
                            <span class="help-block"><?php echo e($errors->first('comment')); ?></span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    [CAPTCHA]
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <a href="#" class="btn btn-lg btn-primary" style="width: 100% !important;">Contact Us!</a>
                </div>
            </div>
        </form>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>