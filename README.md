# Score
##### A Simple Gradebook for Bellevue School District
[![Build Status](https://travis-ci.org/ElliotGluck/Score.svg?branch=hhvm-branch)](https://travis-ci.org/ElliotGluck/Score) [![StyleCI](https://styleci.io/repos/118741627/shield?branch=hhvm-branch)](https://styleci.io/repos/118741627)
#### Abstract
> Form follows function

Beginning in the 2017-18 school year, the Bellevue School District switched from the Aspen gradebook to StudentVue/Synergy. While Aspen was no masterpiece, Synergy left a lot to be desired, so we decided to reverse engineer it and make it better, and easier, for us and other students.

#### API
> "Functional Programming" - [mcklyde](https://github.com/mcklyde)

Score is based off of the [mcklyde/SynergisticGism](https://github.com/mcklyde/SynergisticGism) API, written in Elixir. It is used as a wrapper that converts RESTful, JSON API calls that are developer friendly, to gross and ugly XML calls that Synergy can understand. It then takes the hideous XML response and converts it back into a RESTful JSON response.

#### Design
Synergy is cluttered, non responsive, and looks like it is straight out of the 1990's web 1.0. We used Webflow to design the frontend experience, to make certan it is functional and beautiful across all devices and platforms.

#### Getting Started
You can host this project on almost any run of the mill PHP 7 web server, but we recommend using an HHVM stack for better performance. There are no artisan or composer prerequisits unless you do opt to use HHVM.

#### License

```
MIT License

Copyright (c) 2018 Elliot Gluck

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
```
