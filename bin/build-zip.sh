#!/usr/bin/env bash
#
# Build dist/delta-child.zip from the committed files at HEAD.
# Files marked export-ignore in .gitattributes stay out. The zip's root folder
# is always delta-child, so WordPress installs the theme under that name.
#
set -euo pipefail

cd "$(dirname "${BASH_SOURCE[0]}")/.."

mkdir -p dist
git archive --format=zip --prefix=delta-child/ --output=dist/delta-child.zip HEAD

echo "Built dist/delta-child.zip"
