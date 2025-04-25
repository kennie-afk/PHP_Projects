<aside class="main-sidebar">
  <section class="sidebar">
    <ul class="sidebar-menu" data-widget="tree">

      <li id="dashboardMainMenu">
        <a href="<?= base_url('dashboard') ?>">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>

      <?php if ($user_permission): ?>
        <?php
        $menuItems = [
          'Users' => [
            'icon' => 'fa-users',
            'permissions' => ['createUser', 'updateUser', 'viewUser', 'deleteUser'],
            'submenus' => [
              'Add User' => ['createUser', 'users/create'],
              'Manage Users' => ['updateUser', 'users'],
            ],
          ],
          'Groups' => [
            'icon' => 'fa-files-o',
            'permissions' => ['createGroup', 'updateGroup', 'viewGroup', 'deleteGroup'],
            'submenus' => [
              'Add Group' => ['createGroup', 'groups/create'],
              'Manage Groups' => ['updateGroup', 'groups'],
            ],
          ],
          'Stores' => ['icon' => 'fa-files-o', 'permissions' => ['createStore', 'updateStore', 'viewStore', 'deleteStore'], 'link' => 'stores/'],
          'Tables' => ['icon' => 'fa-files-o', 'permissions' => ['createTable', 'updateTable', 'viewTable', 'deleteTable'], 'link' => 'tables/'],
          'Category' => ['icon' => 'fa-files-o', 'permissions' => ['createCategory', 'updateCategory', 'viewCategory', 'deleteCategory'], 'link' => 'category/'],
          'Products' => [
            'icon' => 'fa-files-o',
            'permissions' => ['createProduct', 'updateProduct', 'viewProduct', 'deleteProduct'],
            'submenus' => [
              'Add Product' => ['createProduct', 'products/create'],
              'Manage Products' => ['updateProduct', 'products'],
            ],
          ],
          'Orders' => [
            'icon' => 'fa-files-o',
            'permissions' => ['createOrder', 'updateOrder', 'viewOrder', 'deleteOrder'],
            'submenus' => [
              'Add Order' => ['createOrder', 'orders/create'],
              'Manage Orders' => ['updateOrder', 'orders'],
            ],
          ],
          'Reports' => [
            'icon' => 'fa-files-o',
            'permissions' => ['viewReport'],
            'submenus' => [
              'Product Wise' => ['viewReport', 'reports'],
              'Total Store Wise' => ['viewReport', 'reports/storewise'],
            ],
          ],
          'Company Info' => ['icon' => 'fa-files-o', 'permissions' => ['updateCompany'], 'link' => 'company/'],
          'Profile' => ['icon' => 'fa-files-o', 'permissions' => ['viewProfile'], 'link' => 'users/profile/'],
          'Setting' => ['icon' => 'fa-wrench', 'permissions' => ['updateSetting'], 'link' => 'users/setting/'],
        ];

        foreach ($menuItems as $menuName => $menu) {
          $hasPermission = false;
          foreach ($menu['permissions'] as $perm) {
            if (in_array($perm, $user_permission)) {
              $hasPermission = true;
              break;
            }
          }

          if ($hasPermission):
            if (isset($menu['submenus'])): ?>
              <li class="treeview">
                <a href="#">
                  <i class="fa <?= $menu['icon'] ?>"></i>
                  <span><?= $menuName ?></span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <?php foreach ($menu['submenus'] as $submenuName => $submenu):
                    if (in_array($submenu[0], $user_permission)): ?>
                      <li><a href="<?= base_url($submenu[1]) ?>"><i class="fa fa-circle-o"></i> <?= $submenuName ?></a></li>
                  <?php endif;
                  endforeach; ?>
                </ul>
              </li>
            <?php else: ?>
              <li><a href="<?= base_url($menu['link']) ?>"><i class="fa <?= $menu['icon'] ?>"></i> <span><?= $menuName ?></span></a></li>
        <?php endif;
          endif;
        }
        ?>
      <?php endif; ?>

      <li><a href="<?= base_url('auth/logout') ?>"><i class="glyphicon glyphicon-log-out"></i> <span>Logout</span></a></li>
    </ul>
  </section>
</aside>