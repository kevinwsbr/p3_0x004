# Well, what's iSoccer?

That's the 4th project of the discipline of **Project of Software**.

## What an user can do?
Check [here](https://docs.google.com/viewer?a=v&pid=sites&srcid=aWMudWZhbC5icnxjb21wMjE1fGd4OjM3ZGU3ZmJiZmRhNmNiOTA).

## Dependencies

- MySQL Server 5.7
- PHP 7.2

## Right, and how to build that?

First, clone this repository. Open the repository folder and navigate to `docs/` and import `isoccer_db.sql` file to your MySQL Server instance. After that, navigate to `src/` folder and execute the PHP built-in server:

```bash
php -S localhost:<port>
```

Finally, open `localhost:<port>` on your browser. The default credentials are user: `admin` and pwd: `admin`.

## License

This project is licensed under the MIT License.