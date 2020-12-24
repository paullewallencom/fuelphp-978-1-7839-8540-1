<?php
namespace Fuel\App;

/**
 * Examples tests 
 *
 * @group App
 */
class Test_Examples extends \TestCase
{
    // This method is executed before all tests are executed.
    // If your unit test require some initialization, you can
    // do it here.
    public static function setUpBeforeClass() {
        \Config::load('mymicroblog', true);

        // Executing migrations (we are on a test database)
        \Migrate::latest('auth', 'package');
        \Migrate::latest();

        // Truncating the tables since we might already have data
        \DBUtil::truncate_table('users');
        \DBUtil::truncate_table('posts');

        // Generating test data
        \Auth::create_user(
            'sdrdis',
            'test',
            'email@email.com'
        );
        for ($i = 1; $i < 100; $i++) {
            $post = \Model_Post::forge(array(
                'content' => 'post 1',
                'user_id' => 1
            ));
            $post->save();
        }

        // ...
    }
    
    /**
	 * Tests the User mapper.
	 *
	 * @test
	 */
    public function test_extract_properties() {
        $object = new \stdClass();
        $object->a = '1';
        $object->b = 2;
        $object->c = true;

        $res = \Mapper::extract_properties(
            $object,
            array('a', 'c')
        );

        $expected_res = array('a' => '1', 'c' => true);

        $this->assertEquals($res, $expected_res);

        // A lot more should be tested...
    }
	
	/**
	 * Tests the User mapper.
	 *
	 * @test
	 */
	public function test_user_mapper() {
        // Getting any user.
        // Note: In order not to depend on the database and on
        // the ORM, you might want to create mock users objects
        // (simulated users objects) and test features on these
        // objects instead...
        $user = \Model_User::find('first');

        // Testing that the profile context returns 4
        // attributes
        $profile = \Mapper_User::get('profile', $user);
        $this->assertCount(4, $profile);

        // Testing that the minimal context returns 1 attribute
        $minimal = \Mapper_User::get('minimal', $user);
        $this->assertCount(1, $minimal);

        // A lot more should be tested...
	}
	
	// This method is executed after all tests have been
    // executed
	static function tearDownAfterClass() {} 
}