<?php

namespace Drupal\graphql_menu\Plugin\GraphQL\Fields;

use Drupal\graphql\Plugin\GraphQL\Fields\FieldPluginBase;
use Drupal\system\MenuInterface;
use Youshido\GraphQL\Execution\ResolveInfo;

/**
 * Retrieve a Drupal menu's description.
 *
 * @GraphQLField(
 *   id = "menu_description",
 *   secure = true,
 *   name = "description",
 *   type = "String",
 *   types = {"Menu"}
 * )
 */
class MenuDescription extends FieldPluginBase {

  /**
   * {@inheritdoc}
   */
  public function resolveValues($value, array $args, ResolveInfo $info) {
    if ($value instanceof MenuInterface) {
      yield $value->getDescription();
    }
  }

}
