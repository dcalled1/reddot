# Welcome to <b> Red Dot </b> Forum

## Contributing

### Create a new development branch

Create a new branch named `dev-<username>` (put your institutional username instead of `<username>`, e.g `dev-dcalled1`).
```bash
git checkout -b dev-<username>
```

### Commit your features

If you didn't add files:

```bash
git commit -a -m "Your commit message"
```

Or, if you created any new file:
```bash
git add .
git commit -m "Your commit message"
```

### Push your changes to the remote repository

First push:
```bash
git push -u origin dev-<username>
```

Subsequent pushes:
```bash
git push
```

### Create a new Pull Request
Go to `Pull Requests` and create a new one (from your development branch `dev-<username>` to `master`).

**Important note:** If there´re pull request available, the reviews will be done the same day at 19-20 o'clock.

---
## Build

### Install and update dependencies

```bash
composer update
```

### Run

```bash
php artisan serve
```

---
## License
[MIT](LICENSE)