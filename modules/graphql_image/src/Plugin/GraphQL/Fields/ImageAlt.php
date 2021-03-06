<?php

namespace Drupal\graphql_image\Plugin\GraphQL\Fields;

use Drupal\graphql\Plugin\GraphQL\Fields\FieldPluginBase;
use Drupal\image\Plugin\Field\FieldType\ImageItem;
use Youshido\GraphQL\Execution\ResolveInfo;

/**
 * Retrieve the image field title.
 *
 * @GraphQLField(
 *   id = "image_alt",
 *   secure = true,
 *   name = "alt",
 *   type = "String",
 *   nullable = true,
 *   types = {"Image"}
 * )
 */
class ImageAlt extends FieldPluginBase {

  /**
   * {@inheritdoc}
   */
  protected function resolveValues($value, array $args, ResolveInfo $info) {
    if ($value instanceof ImageItem && $value->entity->access('view')) {
      yield $value->alt;
    }
  }

}
