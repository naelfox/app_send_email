## app_send_email

# start
to start create a file of credentials (name sample sendProcess.php) in a directory that is not public to insert your credentials use the require of this file created in the processing file 

this is my code example for you to create and encapsulate the data:

```php
header('Location: index.php');

class Credentials
{
    private $host = 'host@host.com';                                          
    private $username  = 'email';
    private $password  = 'pass';


    public function getHost()
    {
        return $this->host;
    }
    public function getUsername()
    {
        return $this->username;
    }
    public function getPassword()
    {
        return $this->password;
    }
}
```