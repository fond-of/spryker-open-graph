# Open Graph integration for Spryker
[![Build Status](https://travis-ci.org/fond-of/spryker-open-graph.svg?branch=master)](https://travis-ci.org/fond-of/spryker-open-graph)
[![PHP from Travis config](https://img.shields.io/travis/php-v/symfony/symfony.svg)](https://php.net/)
[![license](https://img.shields.io/github/license/mashape/apistatus.svg)](https://packagist.org/packages/fond-of-spryker/open-graph)

A Basic implementation of the Facebook Open Graph protocol for Spryker


## Installation

```
composer require fond-of-spryker/open-graph
```

## 1. Enable the Module in the configuration file 
```
// ---------- Google Tag Manager
$config[OpenGraphConstants::ENABLED::ENABLED] = true;

```

## 2. Add Product Image Property Configurations in the configuration file 

```
$config[OpenGraphConstants::PRODUCT_IMAGE_SET] = 'default';
$config[OpenGraphConstants::PRODUCT_IMAGE_URL_TYPE] = 'externalUrlLarge';

```

## 3. Add twig service provider to YvesBootstrap.php in registerServiceProviders()

```
$this->application->register(new OpenGraphTwigServiceProvider());
```

## 4. Add the Twig Extension in the neccessary Twig Templates

```
  Application/layout/layout.twig 
  between <head></head> tags
  
    {# Open Graph Protocol for Facebook and SEO #}
    {% block opengraph %}
        {% set params = {
            'title': 'global.shop.title' | trans,
            'description': '',
            'url': app.request.uri,
            'type': 'website',
            'site_name': app.locale | slice(0, 2)
        }
        %}
        {{ fondOfSpykerOpenGraph(params)}}
    {% endblock %}
```

```
  Catalog/catalog/index.twig 
  {% block opengraph %}
      {% set params = {
          'title': category.name,
          'description': '',
          'url': app.request.uri,
          'type': 'website',
          'site_name': '....'
      }
      %}
      {{ fondOfSpykerOpenGraph(params)}}
  {% endblock %}
```

```
  Product/product/detail.twig  
  {% block opengraph %}
      {% set params = {
          'title': product.name,
          'description': product.description,
          'url': app.request.uri,
          'type': 'product',
          'site_name': '...',
          'product': product
      }
      %}
      {{ fondOfSpykerOpenGraph(params)}}
  {% endblock %}
```