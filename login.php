<?php

require_once 'private/init.php';
$error = false;
if(is_post_request()) {

    $login_result = login_user($_POST);
    if($login_result) {
        hpi_init();
        redirect_to('hpi.php');
    } else {
        $error = true;
    }

}
?>




<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/private/assets/css/style.css" />
    <link rel="stylesheet" href="/private/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/private/assets/css/bs-theme-overrides.css" />
    <link rel="stylesheet" href="/private/assets/fonts/font-awesome.min.css" />
    <link
            rel="stylesheet"
            href="/private/assets/css/Footer-with-social-media-icons.css"
    />
    <title>Register</title>
</head>
    <body>

    <?php vmm_banner('VMM Healthcare'); ?>
    <div class="container-fluid mt-5">
            <form action="login.php" method="POST" class="ps-5 pe-5 mt-3" style="margin: auto; background-color: #05445e; border-radius: 20px;">
                <div class="fs-2 mt-5 text-light text-center">Login</div>

                <div>
                    <label class="form-label mt-2 text-light" for="username">Username</label>
                    <div class="input-group input-group-lg">
                        <span class="input-group-text" id="inputGroup-sizing-lg"><i class="bi bi-person-badge"></i></span>
                        <input type="text" class="form-control form-control-lg" id="username" name="username" placeholder="Enter username">
                    </div>

                </div>

                <div>
                    <label class="form-label mt-2 text-light" for="password">Password</label>
                    <div class="input-group input-group-lg">
                        <span class="input-group-text" id="inputGroup-sizing-lg"><i class="bi bi-asterisk"></i></span>
                        <input  type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Enter password">
                    </div>


                </div>

                <?php if($error) { ?>
                    <div class="p fs-5 text-danger">Invalid Login</div>
                <?php } ?>

                <div class="text-center">
                    <button type="submit" class="btn btn-lg mt-3 mb-3" style="background-color: antiquewhite">Login</button>
                </div>

                <div class="text-center fs-4 pb-3">
                    <a href="index.php" class="text-light">Don't have an account? Register</a>
                </div>

            </form>
        </div>

    <footer id="footerpad">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-8 mx-auto">
                    <ul class="list-inline text-center">
                        <li class="list-inline-item">
                            <a
                                    href="https://www.instagram.com/vmmhealth/?igshid=ZWQyN2ExYTkwZQ=="
                                    target="_blank"
                            ><span class="fa-stack fa-lg"
                                ><i class="fa fa-circle fa-stack-2x"></i
                                    ><i
                                            class="fa fa-instagram fa-stack-1x fa-inverse"
                                    ></i></span
                                ></a>
                        </li>
                        <li class="list-inline-item">
                            <a
                                    href="https://www.linkedin.com/company/virtual-medical-missions/about/"
                                    target="_blank"
                            ><span class="fa-stack fa-lg"
                                ><i class="fa fa-circle fa-stack-2x"></i
                                    ><i class="fa fa-linkedin fa-stack-1x fa-inverse"></i></span
                                ></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://vmm-evisit.azurewebsites.net/" target="_blank">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i
                    ><i
                              class="fa fa-hospital-o fa-stack-1x fa-inverse"
                      ></i> </span
                  ></a>
                        </li>
                    </ul>
                    <p
                            class="copyright text-muted text-center"
                            style="color: var(--bs-body-bg) !important"
                    >
                        Copyright ©2023 Virtual Medical Missions&nbsp;
                    </p>
                    <p style="text-align: center">
                        <span style="color: rgb(254, 251, 241)">All Rights Reserved</span>
                    </p>
                    <p style="text-align: center">
              <span style="color: rgb(254, 251, 241)"
              >VMM is a registered 501(c)(3) nonprofit organization</span
              >
                    </p>
                    <p style="text-align: center">
              <span style="color: rgb(254, 251, 241)"
              >All donations in the United States are tax-deductible.</span
              >
                    </p>
                </div>
            </div>
        </div>
    </footer>


    </body>
    <script src="/private/assets/js/bootstrap.min.js"></script>
</html>

