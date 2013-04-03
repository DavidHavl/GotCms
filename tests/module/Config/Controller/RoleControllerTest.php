<?php
/**
 * This source file is part of GotCms.
 *
 * GotCms is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * GotCms is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License along
 * with GotCms. If not, see <http://www.gnu.org/licenses/lgpl-3.0.html>.
 *
 * PHP Version >=5.3
 *
 * @category Gc_Tests
 * @package  ZfModules
 * @author   Pierre Rambaud (GoT) <pierre.rambaud86@gmail.com>
 * @license  GNU/LGPL http://www.gnu.org/licenses/lgpl-3.0.html
 * @link     http://www.got-cms.com
 */

namespace Config\Controller;

use Gc\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;
use Gc\User\Role\Model as RoleModel;

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.0 on 2013-03-15 at 23:51:06.
 *
 * @backupGlobals disabled
 * @backupStaticAttributes disabled
 * @group    ZfModules
 * @category Gc_Tests
 * @package  ZfModules
 */
class RoleControllerTest extends AbstractHttpControllerTestCase
{
    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     *
     * @return void
     */
    public function setUp()
    {
        $this->init();
    }

    /**
     * Test
     *
     * @covers Config\Controller\RoleController::indexAction
     *
     * @return void
     */
    public function testIndexAction()
    {
        $this->dispatch('/admin/config/user/roles');
        $this->assertResponseStatusCode(200);

        $this->assertModuleName('Config');
        $this->assertControllerName('RoleController');
        $this->assertControllerClass('RoleController');
        $this->assertMatchedRouteName('userRole');
    }

    /**
     * Test
     *
     * @covers Config\Controller\RoleController::createAction
     *
     * @return void
     */
    public function testCreateAction()
    {
        $this->dispatch('/admin/config/user/role/create');
        $this->assertResponseStatusCode(200);

        $this->assertModuleName('Config');
        $this->assertControllerName('RoleController');
        $this->assertControllerClass('RoleController');
        $this->assertMatchedRouteName('userRoleCreate');
    }

    /**
     * Test
     *
     * @covers Config\Controller\RoleController::createAction
     *
     * @return void
     */
    public function testCreateActionWithPostData()
    {
        $this->dispatch(
            '/admin/config/user/role/create',
            'POST',
            array(
                'name' => 'RoleCreateTest',
                'description' => 'Description'
            )
        );
        $this->assertResponseStatusCode(302);

        $this->assertModuleName('Config');
        $this->assertControllerName('RoleController');
        $this->assertControllerClass('RoleController');
        $this->assertMatchedRouteName('userRoleCreate');
    }

    /**
     * Test
     *
     * @covers Config\Controller\RoleController::createAction
     *
     * @return void
     */
    public function testCreateActionWithWrongPostData()
    {
        $this->dispatch(
            '/admin/config/user/role/create',
            'POST',
            array(
            )
        );
        $this->assertResponseStatusCode(200);

        $this->assertModuleName('Config');
        $this->assertControllerName('RoleController');
        $this->assertControllerClass('RoleController');
        $this->assertMatchedRouteName('userRoleCreate');
    }

    /**
     * Test
     *
     * @covers Config\Controller\RoleController::deleteAction
     *
     * @return void
     */
    public function testDeleteAction()
    {
        $role_model = RoleModel::fromArray(
            array(
                'name'        => 'RoleTest',
                'description' => 'Description',
            )
        );
        $role_model->save();
        $this->dispatch('/admin/config/user/role/delete/' . $role_model->getId());
        $this->assertResponseStatusCode(200);

        $this->assertModuleName('Config');
        $this->assertControllerName('RoleController');
        $this->assertControllerClass('RoleController');
        $this->assertMatchedRouteName('userRoleDelete');
    }

    /**
     * Test
     *
     * @covers Config\Controller\RoleController::deleteAction
     *
     * @return void
     */
    public function testDeleteActionWithWrongId()
    {
        $this->dispatch('/admin/config/user/role/delete/9999');
        $this->assertResponseStatusCode(200);

        $this->assertModuleName('Config');
        $this->assertControllerName('RoleController');
        $this->assertControllerClass('RoleController');
        $this->assertMatchedRouteName('userRoleDelete');
    }

    /**
     * Test
     *
     * @covers Config\Controller\RoleController::editAction
     *
     * @return void
     */
    public function testEditAction()
    {
        $role_model = RoleModel::fromArray(
            array(
                'name'        => 'RoleTest',
                'description' => 'Description',
            )
        );
        $role_model->save();
        $this->dispatch('/admin/config/user/role/edit/' . $role_model->getId());
        $this->assertResponseStatusCode(200);

        $this->assertModuleName('Config');
        $this->assertControllerName('RoleController');
        $this->assertControllerClass('RoleController');
        $this->assertMatchedRouteName('userRoleEdit');

        $role_model->delete();
    }

    /**
     * Test
     *
     * @covers Config\Controller\RoleController::editAction
     *
     * @return void
     */
    public function testEditActionWithPostData()
    {
        $role_model = RoleModel::fromArray(
            array(
                'name'        => 'RoleTest',
                'description' => 'Description',
            )
        );
        $role_model->save();
        $this->dispatch(
            '/admin/config/user/role/edit/' . $role_model->getId(),
            'POST',
            array(
                'name'        => 'RoleTest',
                'description' => 'Description',
            )
        );
        $this->assertResponseStatusCode(302);

        $this->assertModuleName('Config');
        $this->assertControllerName('RoleController');
        $this->assertControllerClass('RoleController');
        $this->assertMatchedRouteName('userRoleEdit');

        $role_model->delete();
    }

    /**
     * Test
     *
     * @covers Config\Controller\RoleController::editAction
     *
     * @return void
     */
    public function testEditActionWithWrongPostData()
    {
        $role_model = RoleModel::fromArray(
            array(
                'name'        => 'RoleTest',
                'description' => 'Description',
            )
        );
        $role_model->save();
        $this->dispatch(
            '/admin/config/user/role/edit/' . $role_model->getId(),
            'POST',
            array(
            )
        );
        $this->assertResponseStatusCode(200);

        $this->assertModuleName('Config');
        $this->assertControllerName('RoleController');
        $this->assertControllerClass('RoleController');
        $this->assertMatchedRouteName('userRoleEdit');

        $role_model->delete();
    }

    /**
     * Test
     *
     * @covers Config\Controller\RoleController::editAction
     *
     * @return void
     */
    public function testEditActionWithWrongId()
    {
        $this->dispatch('/admin/config/user/role/edit/9999');
        $this->assertResponseStatusCode(302);

        $this->assertModuleName('Config');
        $this->assertControllerName('RoleController');
        $this->assertControllerClass('RoleController');
        $this->assertMatchedRouteName('userRoleEdit');
    }
}