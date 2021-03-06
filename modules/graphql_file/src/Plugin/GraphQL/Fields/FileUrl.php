<?php

namespace Drupal\graphql_file\Plugin\GraphQL\Fields;

use Drupal\file\FileInterface;
use Drupal\graphql\Plugin\GraphQL\Fields\FieldPluginBase;
use Youshido\GraphQL\Execution\ResolveInfo;

/**
 * Entity route field override for files.
 *
 * @GraphQLField(
 *   id = "file_url",
 *   secure = true,
 *   name = "url",
 *   type = "String",
 *   types = {"File"}
 * )
 */
class FileUrl extends FieldPluginBase {

  /**
   * {@inheritdoc}
   */
  public function resolveValues($value, array $args, ResolveInfo $info) {
    if ($value instanceof FileInterface) {
      yield file_create_url($value->getFileUri());
    }
  }

}
