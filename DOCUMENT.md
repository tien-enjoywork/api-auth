# APIs

## Request header
```bash
Accept : application/json
Authorization : Bearer token
```

## Request param

Body type raw json

Register
```bash
{
    "name" : "tienpham",
    "email" : "tienpham@kr.com",
    "password" : "12345678",
    "password_confirmation" : "12345678"
}
```

Login
```bash
{
    "email" : "tienpham@kr.com",
    "password" : "123456789"
}
```

Forgot password
```bash
{
    "email" : "tienpham@kr.com"
}
```

Reset password
```bash
{
    "email" : "tienpham@kr.com",
    "password" : "12345678910",
    "password_confirmation" : "12345678910",
    "token" : "9UKCmOVY8ZELd8sB2915YuGmIt5Ka39hU9Pt90sYem17r1uYxepxaf6Y31FV"
}
```

## Response

With error
```bash
{
    "success": false,
    "message": {
        "email": [
            "The email must be a valid email address."
        ]
    },
    "error_code": 400,
    "data": []
}
```
With no error
```bash
{
    "success": true,
    "message": "We have e-mailed your password reset link!",
    "data": {
        "token": "ktGL2KpvCHqIL0VPPuPPo8f1FD7deKTFfAqTxbYe8tek4Zyw4pEQSyC0ummZ"
    }
}
```
**Happy coding**!
