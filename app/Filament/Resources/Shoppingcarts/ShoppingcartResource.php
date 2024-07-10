<?php

namespace App\Filament\Resources\Shoppingcarts;

use App\Filament\Resources\Shoppingcarts\ShoppingcartResource\Pages;
use App\Filament\Resources\Shoppingcarts\ShoppingcartResource\RelationManagers;
use App\Filament\Resources\Shoppingcarts\ShoppingcartResource\RelationManagers\ProductsRelationManager;
use App\Models\Shoppingcarts\Shoppingcart;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ShoppingcartResource extends Resource
{
    protected static ?string $model = Shoppingcart::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';

    protected static ?string $navigationLabel = 'Shoppingcarts';

    protected static ?string $navigationGroup = 'Customers';

    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            ProductsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListShoppingcarts::route('/'),
            'create' => Pages\CreateShoppingcart::route('/create'),
            'view' => Pages\ViewShoppingcart::route('/{record}'),
            'edit' => Pages\EditShoppingcart::route('/{record}/edit'),
        ];
    }
}
