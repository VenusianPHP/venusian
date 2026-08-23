# ScrapyardIO

[![Latest Version on Packagist](https://img.shields.io/packagist/v/scrapyard-io/framework.svg)](https://packagist.org/packages/scrapyard-io/framework)
[![Total Downloads](https://img.shields.io/packagist/dt/scrapyard-io/framework.svg)](https://packagist.org/packages/scrapyard-io/framework)
[![License](https://img.shields.io/packagist/l/scrapyard-io/framework.svg)](https://packagist.org/packages/scrapyard-io/framework)

## About ScrapyardIO

ScrapyardIO is a PHP application framework with expressive, elegant syntax for building applications that use windowed GUIs, human inputs, and integrated circuits. We believe development must be an enjoyable and creative experience to be truly fulfilling. ScrapyardIO takes the pain out of development by easing common tasks used in embedded and edge projects, such as:

- [Powerful dependency injection container](https://scrapyard-io.projectsaturnstudios.com/docs/chassis)
- Multiple back-ends for [cache](https://scrapyard-io.projectsaturnstudios.com/docs/cache) storage
- Database agnostic [schema migrations](https://scrapyard-io.projectsaturnstudios.com/docs/migrations)
- [Robust background job processing](https://scrapyard-io.projectsaturnstudios.com/docs/queues)
- [Workshop CLI](https://scrapyard-io.projectsaturnstudios.com/docs/workshop) and [Wrench REPL](https://scrapyard-io.projectsaturnstudios.com/docs/workshop#wrench)

ScrapyardIO is accessible, powerful, and provides tools required for large, robust applications — including driving GPIO, I2C, SPI, UART, and related hardware through companion packages.

## Learning ScrapyardIO

ScrapyardIO has documentation and guides on the [ScrapyardIO website](https://scrapyard-io.projectsaturnstudios.com/docs), making it a breeze to get started with the framework.

## Open Knowledge Format (`.okf`)

This skeleton ships with a package-root [`.okf/`](.okf/) knowledge bundle for agents and humans working on your app. It is **included** when you create a project from this repository (`composer create-project` / Git archive) so local development keeps that context.

When you are ready to deploy the app to a target (for example an SBC), exclude the knowledge bundle from the deploy archive by adding the following line to your project's `.gitattributes`:

```gitattributes
/.okf export-ignore
```

That keeps `.okf` in your development clone while omitting it from `git archive` / Composer-style export artifacts used for deployment.

## Contributing

Thank you for considering contributing to ScrapyardIO! The contribution guide can be found in the [ScrapyardIO documentation](https://scrapyard-io.projectsaturnstudios.com/docs/contributions).

## Code of Conduct

In order to ensure that the ScrapyardIO community is welcoming to all, please review and abide by the [Code of Conduct](https://scrapyard-io.projectsaturnstudios.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

Please review [our security policy](https://github.com/ScrapyardIO/scrapyard-io/security/policy) on how to report security vulnerabilities.

## License

The ScrapyardIO framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
