<?php

namespace Drupal\graphql_menu\Plugin\GraphQL\Fields;

use Drupal\Core\Menu\MenuLinkTreeElement;
use Drupal\graphql\Plugin\GraphQL\Fields\FieldPluginBase;
use Youshido\GraphQL\Execution\ResolveInfo;

/**
 * Check if the menu link is expanded.
 *
 * @GraphQLField(
 *   id = "menu_link_expanded",
 *   secure = true,
 *   name = "expanded",
 *   type = "Boolean",
 *   types = {"MenuLink"}
 * )
 */
class MenuLinkExpanded extends FieldPluginBase {

  /**
   * {@inheritdoc}
   */
  public function resolveValues($value, array $args, ResolveInfo $info) {
    if ($value instanceof MenuLinkTreeElement) {
      yield $value->link->isExpanded();
    }
  }

}
