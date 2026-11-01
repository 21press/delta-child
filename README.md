# Delta Child

A starter child theme for [Delta](https://deltatheme.com), the agent-first WordPress theme with built-in MCP.

Most Delta sites don't need one. Pages, templates, tokens and site CSS already live in the database and uploads, and a Delta update leaves them alone. Use a child theme for what has to be a file: custom PHP hooks, a stylesheet you keep in version control, or an override of one of Delta's PHP templates.

Delta's documentation: [deltatheme.com/docs](https://deltatheme.com/docs/).

## Install

Delta must be installed in a folder named `delta`, with an active license.

1. Download [delta-child.zip](https://github.com/21press/delta-child/releases/latest/download/delta-child.zip). Use this file and not GitHub's "Source code" archive, whose folder name carries the version number.
2. In wp-admin, go to Appearance → Themes → Add New Theme → Upload Theme, and upload the file.
3. Activate **Delta Child**.

Or with WP-CLI:

```bash
wp theme install https://github.com/21press/delta-child/releases/latest/download/delta-child.zip --activate
```

## What's in it

| File | What it does |
|---|---|
| `style.css` | Theme header, and your CSS. Loads after `site.css`, before page and template CSS. |
| `functions.php` | Loads `style.css`, copies Delta's per-theme settings such as Additional CSS on activation. Your PHP goes at the end. |
| `screenshot.png` | The picture on Appearance → Themes. |

WordPress loads `functions.php` before Delta's, so code that uses Delta's constants or classes goes inside a hook.

## Updates

The child theme doesn't update itself, because it holds your own code. Delta updates through its license as before. To take something from a later version of this starter, read [CHANGELOG.md](CHANGELOG.md) and copy the change by hand.

## Releasing (maintainers)

1. Change `Version:` in `style.css` and add a section to `CHANGELOG.md`.
2. Commit, then tag with no `v` prefix: `git tag 1.1.0 && git push origin main 1.1.0`.

The release workflow checks that the tag matches `style.css` and the changelog, builds `delta-child.zip`, and publishes the release. To build the zip locally, run `bin/build-zip.sh`.

## License

GPLv2 or later. See [LICENSE](LICENSE).
