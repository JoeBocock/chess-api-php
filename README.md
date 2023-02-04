<div align="center">
    <img src="logo.png" alt="chess.com logo" width="250" height="auto" />
    <h1>Chess.com PHP API SDK</h1>
    <p>A simple PHP SDK to work with the public chess.com API.</p>
</div>

<div align="center">
    <p>
        <img alt="GitHub Workflow Status" src="https://img.shields.io/github/actions/workflow/status/joebocock/chess-api-php/Tests.yml?style=flat-square">
        <img alt="GitHub issues" src="https://img.shields.io/github/issues/joebocock/chess-api-php?style=flat-square">
        <img alt="GitHub commit activity" src="https://img.shields.io/github/commit-activity/m/joebocock/chess-api-php?style=flat-square">
        <img alt="GitHub code size in bytes" src="https://img.shields.io/github/languages/code-size/joebocock/chess-api-php?style=flat-square">
    </p>
</div>

<br />

> **Warning**: This package is still in active development and in very early stages.

## Table of Contents

- [Introduction](#introduction)
- [Usage](#usage)
- [Development](#development)
- [Contributing](#contributing)

<br />

## Introduction

This (un-released) PHP Composer package provides a simple SDK to interact with Chess.com's "Published Data" API. This provides all public data that Chess.com makes available without authenticating with their service. This includes but is not limited to...

- Player Profiles
- Player Statistics
- Player Online Status
- Game Statistics
- Clubs
- Tournaments
- Countries
- Streamers
- Leaderboards

This package can be used out-of-box with **zero** configuration. However, you may provide a configured HTTP client if you wish, given it follows PSR-18.

<br />

## Usage

This package is not yet complete, but I am actively working on it. Once I get to a point that a decent portion of endpoints are implemented, I will release the package on Composer.

General usage is simple and you can be up and running in no time.

<br />

```php

use JoeBocock\ChessApi\Chess;

$client = new Chess();

/** @var JoeBocock\Entities\PlayerProfile */
$playerProfile = $client->playerProfile('gothamchess');

echo $playerProfile->name;
// 'Levy Rozman'

```

<br />

Under the hood, Guzzle will be used to make the request - but if you have your own PSR-18 compliant HTTP client, you may provide it while constructing the `Chess` class. This is great for when you need to configure the Client beforehand.

<br />

```php

use GuzzleHttp\Client;
use JoeBocock\ChessApi\Chess;

$client = new Chess(
    new Client([
        // configuration...
    ])
);

```

<br />

For all endpoints, the client provides descriptive methods to easily handle the request construction and subsequent hydration of the response. These methods also provide some basic input validation to help you catch issues before making the request.

Sometimes however, you may wish to handle the request construction yourself. The Chess client allows you to do just that.

<br />

```php

use JoeBocock\ChessApi\Chess;
use JoeBocock\ChessApi\Requests\PlayerProfileRequest;

$client = new Chess();

$request = new PlayerProfileRequest();

$request->setUsername('lud-skywalker');

$response = $client->send($request);

```

<br />

While we'd hope nothing goes wrong during usage, sometimes Chess.com might return a 404, 429 or even 5XX. In this case, our `Chess` class throws three different exceptions to help discern the problem.

Invalid arguments will produce an `InvalidArgumentException` as expected. A `ChessRequestException` will occur whenever there was an issue produced by the HTTP Client. Finally, a `ChessResponseException` will happen whenever a response was returned that cannot be properly hydrated into an entity.

<br />

```php

use JoeBocock\ChessApi\Chess;
use JoeBocock\ChessApi\Exceptions\ChessRequestException;
use JoeBocock\ChessApi\Exceptions\ChessResponseException;

$client = new Chess();

try {
    $playerProfile = $client->playerProfile('gothamchess');
} catch (ChessRequestException|ChessResponseException|\InvalidArgumentException $e) {
    // handle...
}

```

<br />

## Development

As this is just a package, it has no requirement for a web server locally. Development is powered by a very simple Docker container that is used to run all commands.

To get started, first clone the repository. A Makefile is provided for convenience of command handling...

<br />

```make

# Build the container
make build

# Install Composer Dependencies
make install

# Run the test suite
make test

# Run static analysis
make stan

# Format the codebase
make format

# Lint the codebase
make lint

```

<br />

## Contributing

As the package is still in development and hasn't reached v1 yet, I haven't written any contribution guidelines. But don't let that stop you! Please feel free to fork the codebase, get a feel for the style and submit a PR.
