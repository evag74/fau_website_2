from flask import Flask
from flask_sqlalchemy import SQLAlchemy
from os import path, getenv
from flask_login import LoginManager
from .config import DevelopmentConfig, Config, StagingConfig
from flask_migrate import Migrate

db = SQLAlchemy()
migrate = Migrate()
DB_NAME = "database.db"


def create_app():
    app = Flask(__name__)
    # sets development/production enviornment
    #env_config = DevelopmentConfig
    env_config = getenv("APP_SETTINGS", "DevelopmentConfig")
    if env_config == 'Config':
        env_config = Config
    elif env_config == 'StagingConfig':
        env_config = StagingConfig
    else:
        env_config = DevelopmentConfig
    print(env_config)
    app.config.from_object(env_config)
    # app.config['SECRET_KEY'] = 'hjshjhdjah kjshkjdhjs'
    # app.config['SQLALCHEMY_DATABASE_URI'] = f'sqlite:///{DB_NAME}'
    db.init_app(app)
    migrate.init_app(app, db)

    from .views import views
    from .auth import auth

    app.register_blueprint(views, url_prefix='/')
    app.register_blueprint(auth, url_prefix='/')

    from .models import User, Location, LocationStatus

    create_database(app)

    login_manager = LoginManager()
    login_manager.login_view = 'auth.login'
    login_manager.init_app(app)

    @login_manager.user_loader
    def load_user(id):
        return User.query.get(int(id))

    return app


def create_database(app):
    # if not path.exists('website/' + DB_NAME):
    db.create_all(app=app)
    print('Created Database!')