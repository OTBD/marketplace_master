<?php
session_start();
include("functions/config.php");
include("functions/sitehead.php");
include("functions/topbar.php");
?>
<div class="search-header">
    <div class="row">
        <div class="container">
            <div class="col-lg-12">
                <div class="header">
                   Sample Blog Title
                </div>
            </div>
        </div>
    </div>
</div>

<div class="blog-full">
    <div class="row">
        <div class="container">
            <div class="col-lg-8">
                <div class="blog-full-bg">
                    <div class="blog-title">Sample Blog Title Goes here</div>
                    <div class="blog-sub"><span class="date">29th Jan 2016</span> | Category | by Owen Dawson</div>
                    <div class="blog-image"></div>
                    <div class="blog-content">
                        sample text
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="blog-full-right">
                    <div class="blog-categories">
                        <div class="title">Categories</div>
                        <nav>
                            <ul>
                                <li><a href="#">WordPress</a><span class="count">(23)</span></li>
                                <li><a href="#">Product Reviews</a><span class="count">(13)</span></li>
                                <li><a href="#">HTML</a><span class="count">(33)</span></li>
                                <li><a href="#">Annoucements</a><span class="count">(3)</span></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="blog-tags">
                        <div class="title">Tags</div>
                        <div class="tags">Tags, Will, Go, Here</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="blue-cta">
    <div class="row">
        <div class="container">
            <div class="col-lg-12">
                <div class="sign-up">Subscribe to our free update deals, announcements, freebies offer and More..!</div>
                <form>
                    <input type="text" placeholder="Enter your email..">
                    <input type="submit" placeholder="Submit">
                </form>
            </div>
        </div>
    </div>
</div>
<?php include("functions/footer.php");?>