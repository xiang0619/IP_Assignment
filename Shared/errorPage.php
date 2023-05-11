    <?php
    // display_errors is set to off to prevent error output being shown to the user
    ini_set('display_errors', 0);

    // error_reporting is set to report all errors
    error_reporting(E_ALL);

    // function to handle all errors
    function errorHandler($errno, $errstr, $errfile, $errline) {
        // header is set to 500 to indicate a server error
        header('HTTP/1.1 500 Internal Server Error');
        
        // HTML code to display the error message to the user
        echo "<table style=\" margin: 50px auto 0;box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);background-color: white;\">
                  <thead>
                      <tr>
                          <th style=\"text-align: center;padding-top: 15px;color: black;\"><h1>404</h1></th>
                      </tr>
                  </thead>
                  <tbody>
                        <tr>
                          <th style=\"text-align: center;color: black;padding-left: 15px;padding-right: 15px\"><h3>OOPS!PAGE NOT FOUND</h3></th>
                      </tr>
                      <tr>
                          <td style=\"text-align: center;color: black;padding-left: 15px;padding-right: 15px\">Sorry, the page you're looking for does not exist. If you </br> think something is broken, please contact us.</td>
                      </tr>
                      <tr>
                          <td style=\"text-align: center;padding-bottom: 15px\"><h5></br>    <div style=\"text-align: center;\">
                                      <a href=\"javascript:history.back()\" style=\"background-color: rgba(43,222,222,255); color: white; border: none; padding:5px 25px;text-decoration: none;\">Go Back</a>
                                  </div></h5>
                          </td>
                      </tr>
                  </tbody>
              </table>";

        // exit the script
        exit;
    }

    // set the error handler function
    set_error_handler('errorHandler');
