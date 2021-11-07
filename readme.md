# BPPTIK Sale

[![Build Status](https://travis-ci.org/dwyl/esta.svg?branch=master)](https://github.com/handokoadjipangestu/project-learn-jwd-150221-sale)
[![stability-experimental](https://img.shields.io/badge/stability-experimental-orange.svg)](https://github.com/handokoadjipangestu/project-learn-jwd-150221-sale)
[![contributions welcome](https://img.shields.io/badge/contributions-welcome-brightgreen.svg?style=flat)](https://github.com/handokoadjipangestu/project-learn-jwd-150221-sale/fork)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)

BPPTIK Sale is a web application to record sales of new and used goods.

This project is the task of BPPTIK before participating in the certification which will start in March 2021. It was made using native PHP and for appearance it uses a [Bootstrap 4.\*](https://getbootstrap.com/docs/4.0/getting-started/introduction/) framework with [AdminLTE](https://adminlte.io/) template.

For those who want to contribute, just fork or download as usual!

## Requirements

- PHP >= 5.3.7
- Of course with the internet

## Installation

Just fork or download it from this repository then copy it to htdocs directory.

## Usage example

![Dashboard](http://bebaskripsi.000webhostapp.com/project-learn-jwd-150221-sale/dashboard.png?)

![Data items](http://bebaskripsi.000webhostapp.com/project-learn-jwd-150221-sale/data-items.png?)

![Data sales](http://bebaskripsi.000webhostapp.com/project-learn-jwd-150221-sale/data-sales.png?)

_For more examples and usage, please contact [Handoko Adji Pangestu](https://www.instagram.com/handokoadp/)._

## Development setup

In the `Sales model` section, in the method store replace the header with your baseUrl.

```sh
header('Location: http://localhost/project-learn/bpptik/project-learn-jwd-150221-sale/index.php?pref=sale&page=index');
```

to :

```sh
header('Location: {baseUrl}/index.php?pref=sales&page=index');
```

## Release History

- 0.0.1
  - Work in progress

## Meta

Handoko Adji Pangestu – [@handokoadjip](https://www.instagram.com/handokoadjip/) – handokoadjipangestu@gmail.com

Distributed under the MIT license. See `LICENSE` for more information.

[https://opensource.org/licenses/MIT](https://opensource.org/licenses/MIT)

## Contributing

1. Fork it (<https://github.com/handokoadjipangestu/project-learn-jwd-150221-sale/fork>)
2. Create your feature branch (`git checkout -b feature/fooBar`)
3. Commit your changes (`git commit -am 'Add some fooBar'`)
4. Push to the branch (`git push origin feature/fooBar`)
5. Create a new Pull Request
