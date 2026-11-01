# Changelog

This project follows [Semantic Versioning](https://semver.org). Tags have no `v` prefix, like Delta's own: `1.0.0`.

## 1.0.0 - 2026-11-02

First release.

- Child theme of Delta, for sites running Delta in a folder named `delta`.
- `style.css` loads after Delta's styles and `site.css`, and before page and template CSS, including when a design system such as Automatic.css prints `site.css` at the end of the head.
- `functions.php` keeps Additional CSS and other per-theme settings when you switch from Delta to the child theme.
