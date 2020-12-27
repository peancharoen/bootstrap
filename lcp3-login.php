<?php session_start(); 
//include_once('lcp3-functions.php');
include_once('lcp3-functions.php');
	$regdata = new DB_con();

?>
<!doctype html>
<html lang="en">
          <!--<form action="lcp3-checkin.php" method="post">
          <div class="imgcontainer">
                    <img src="/bootstrap/img/avatar.png" alt="Avatar" class="avatar">
          </div>
          <div class="container">
                    <label for="email"><b>E-mail</b></label>
                    <input type="text" placeholder="Enter E-mail" name="email" required>
                    <label for="psw"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="psw" required>
                    <button type="submit">Login</button>
          </div>
</form>Modal -->


          <div class="container">
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                              aria-hidden="true">
                              <div class="modal-dialog">
                                        <div class="modal-content">
                                                  <div class="modal-header">
                                                            <div class="imgcontainer">
                                                                      <img src="/bootstrap/img/avatar.png" alt="Avatar"
                                                                                class="avatar">
                                                            </div>
                                                            <h5 class="modal-title mb-0 center" id="exampleModalLabel">
                                                                      Log in</h5>
                                                            <button type="button" class="btn-close"
                                                                      data-bs-dismiss="modal"
                                                                      aria-label="Close"></button>
                                                  </div>
                                                  <div class="modal-body">
                                                            <form action="#" method="post">
                                                                      <input type="hidden" name="csrftoken"
                                                                                value="ea49375f43c7e6a59c77df1e4de562b3f1350124eeb70e5d5124e4ce3b5251c2b4d12e9aaf2a3ddc618c178c8dc4620b">
                                                                      <div class="form-group mb-3">
                                                                                <label for="emailaddress">Email </label>
                                                                                <input type="email" name="email"
                                                                                          placeholder="Enter email"
                                                                                          class="form-control"
                                                                                          required="">
                                                                      </div>
                                                                      <div class="form-group mb-3">
                                                                                <label for="password">Password</label>
                                                                                <div class="input-group bg-light"
                                                                                          id="show_hide_password">
                                                                                          <input type="password"
                                                                                                    class="form-control"
                                                                                                    id="password"
                                                                                                    value="Passwords"
                                                                                                    name="password"
                                                                                                    placeholder="Enter Password"
                                                                                                    required="">
                                                                                          <div
                                                                                                    class="input-group-addon">
                                                                                                    <a href=""><i class="fa fa-lg fa-eye"
                                                                                                                        style="padding-top: 10px; padding-left: 10px; padding-right: 10px;"
                                                                                                                        aria-hidden="true"></i></a>
                                                                                          </div>
                                                                                </div>
                                                                      </div>
                                                                      <div class="form-group mb-3">
                                                                                <div
                                                                                          class="custom-control custom-checkbox checkbox-success">
                                                                                          <input type="checkbox"
                                                                                                    class="custom-control-input"
                                                                                                    id="checkbox-signin"
                                                                                                    checked>
                                                                                          <label class="custom-control-label"
                                                                                                    for="checkbox-signin">Remember
                                                                                                    me</label>
                                                                                </div>
                                                                      </div>
                                                                      <div class="form-group mb-0 text-center">
                                                                                <button class="btn btn-primary btn-block"
                                                                                          type="submit" name="submit">
                                                                                          Log In </button>
                                                                      </div>

                                                            </form>
                                                  </div>
                                                  <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                      data-bs-dismiss="modal">Close</button>
                                                            <button type="button" class="btn btn-primary">Save
                                                                      changes</button>
                                                  </div>
                                        </div>
                              </div>
                    </div>
          </div>